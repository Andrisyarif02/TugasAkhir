<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Product;
use App\HistoryProduct;
use App\ProductTranscation;
use App\Transcation;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use DB;
use PDF;
use Darryldecode\Cart\CartCondition;

use Haruncpi\LaravelIdGenerator\IdGenerator;


class TransactionController extends Controller
{
    public function index(Request $request)
    {

        //product

        // $products = Product::when(request('search'), function ($query) {
        //     return $query->where('name', 'like', '%' . request('search') . '%');
        // })
        //     ->orderBy('created_at', 'desc')
        //     ->paginate(12);
        if ($request->cat || $request->search) {
            if ($request->cat != "all" && $request->search) {
                $products = Product::where('description', $request->cat)->where('name', 'like', '%' . $request->search . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else if ($request->cat == "all" && $request->search) {
                $products = Product::where('name', 'like', '%' . $request->search . '%')
                    ->orderBy('created_at', 'desc')
                    ->get();
            } else if (!$request->search) {
                if ($request->cat == "all") {
                    $products = Product::orderBy('created_at', 'desc')
                        ->get();
                } else {
                    $products = Product::where('description', $request->cat)
                        ->orderBy('created_at', 'desc')
                        ->get();
                }
            }
            $data[] = [];
            if ($products) {
                foreach ($products as $key => $value) {
                    $data[$key] = [
                        "img" => $value->image,
                        "name" => Str::words($value->name, 6),
                        "price" => number_format($value->price, 2, ',', '.'),
                        "qty" => $value->qty,
                        "id" => $value->id,
                        "url_detail" => route('products.edit', $value->id)
                    ];
                }
            }
            return response()->json($data);
        } else {
            $products = Product::get();
            $categories = \App\Category::all();

            //cart item
            if (request()->tax) {
                $tax = "+10%";
            } else {
                $tax = "0%";
            }

            $condition = new \Darryldecode\Cart\CartCondition(array(
                'name' => 'pajak',
                'type' => 'tax', //tipenya apa
                'target' => 'total', //target kondisi ini apply ke mana (total, subtotal)
                'value' => $tax, //contoh -12% or -10 or +10 etc
                'order' => 1
            ));

            \Cart::session(Auth()->id())->condition($condition);

            $items = \Cart::session(Auth()->id())->getContent();

            if (\Cart::isEmpty()) {
                $cart_data = [];
            } else {
                foreach ($items as $row) {
                    $cart[] = [
                        'rowId' => $row->id,
                        'name' => $row->name,
                        'qty' => $row->quantity,
                        'pricesingle' => $row->price,
                        'price' => $row->getPriceSum(),
                        'created_at' => $row->attributes['created_at'],
                    ];
                }

                $cart_data = collect($cart)->sortBy('created_at');
            }

            //total
            $sub_total = \Cart::session(Auth()->id())->getSubTotal();
            $total = \Cart::session(Auth()->id())->getTotal();

            $new_condition = \Cart::session(Auth()->id())->getCondition('pajak');
            $pajak = $new_condition->getCalculatedValue($sub_total);

            $data_total = [
                'sub_total' => $sub_total,
                'total' => $total,
                'tax' => $pajak
            ];
            return view('pos.index', compact('products', 'cart_data', 'data_total', 'categories'));
        }
    }

    public function filter($id)
    {
        if ($id == 0) {
        }
    }

    public function addProductCart($id)
    {
        $product = Product::find($id);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($cek_itemId->isNotEmpty()) {
            if ($product->qty == $cek_itemId[$id]->quantity) {
                return redirect()->back()->with('error', 'jumlah item kurang');
            } else {
                \Cart::session(Auth()->id())->update($id, array(
                    'quantity' => 1
                ));
            }
        } else {
            \Cart::session(Auth()->id())->add(array(
                'id' => $id,
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'attributes' => array(
                    'created_at' => date('Y-m-d H:i:s')
                )
            ));
        }

        return redirect()->back();
    }

    public function removeProductCart($id)
    {
        \Cart::session(Auth()->id())->remove($id);

        return redirect()->back();
    }

    public function bayar(Request $request)
    {
        $cart_total = request()->totalHidden;
        $bayar = request()->bayar;
        $name = request()->name;
        $number = request()->number;
        $kembalian = (int)$bayar - (int)$cart_total;

        if ($kembalian >= 0) {
            DB::beginTransaction();

            try {

                $all_cart = \Cart::session(Auth()->id())->getContent();


                $filterCart = $all_cart->map(function ($item) {
                    return [
                        'id' => $item->id,
                        'quantity' => $item->quantity
                    ];
                });

                foreach ($filterCart as $cart) {
                    $product = Product::find($cart['id']);

                    if ($product->qty == 0) {
                        return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran tidak valid');
                    }

                    HistoryProduct::create([
                        'product_id' => $cart['id'],
                        'user_id' => Auth::id(),
                        'qty' => $product->qty,
                        'qtyChange' => -$cart['quantity'],
                        'tipe' => 'decrease from transaction'
                    ]);

                    $product->decrement('qty', $cart['quantity']);
                }

                $id = IdGenerator::generate(['table' => 'transcations', 'length' => 10, 'prefix' => 'INV-', 'field' => 'invoices_number']);

                $transaction = \App\Transcation::all();

                Transcation::create([
                    'invoices_number' => $id,
                    'user_id' => Auth::id(),
                    'store' => Auth::user()->store,
                    'pay' => request()->bayar,
                    'total' => $cart_total,
                    'name' => $name,
                    'number' => $number,
                ]);

                foreach ($filterCart as $cart) {

                    ProductTranscation::create([
                        'product_id' => $cart['id'],
                        'invoices_number' => $id,
                        'qty' => $cart['quantity'],
                    ]);
                }

                \Cart::session(Auth()->id())->clear();

                DB::commit();
                return redirect()->back()->with([
                    "success" => 'Transaksi Berhasil dilakukan, Klik History untuk print',
                    "inv" => $id
                ]);
            } catch (\Exeception $e) {
                DB::rollback();
                return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran tidak valid');
            }
        }
        return redirect()->back()->with('errorTransaksi', 'jumlah pembayaran tidak valid');
    }

    public function clear()
    {
        \Cart::session(Auth()->id())->clear();
        return redirect()->back();
    }

    public function decreasecart($id)
    {
        $product = Product::find($id);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($cek_itemId[$id]->quantity == 1) {
            \Cart::session(Auth()->id())->remove($id);
        } else {
            \Cart::session(Auth()->id())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => -1
                )
            ));
        }
        return redirect()->back();
    }


    public function increasecart($id)
    {
        $product = Product::find($id);

        $cart = \Cart::session(Auth()->id())->getContent();
        $cek_itemId = $cart->whereIn('id', $id);

        if ($product->qty == $cek_itemId[$id]->quantity) {
            return redirect()->back()->with('error', 'jumlah item kurang');
        } else {
            \Cart::session(Auth()->id())->update($id, array(
                'quantity' => array(
                    'relative' => true,
                    'value' => 1
                )
            ));

            return redirect()->back();
        }
    }

    public function history()
    {
        if (Auth::user()->roles == 'Karyawan')
            $history = Transcation::where('store', Auth::user()->store)->orderBy('created_at', 'desc')->get();
        else
            $history = Transcation::orderBy('created_at', 'desc')->get();

        return view('pos.history', compact('history'));
    }

    public function laporan($id)
    {
        $transaksi = Transcation::with('productTranscation')->find($id);
        return view('laporan.transaksi', compact('transaksi'));
    }

    public function ubahStatus(Request $request)
    {
        // $request = json_decode($request);
        $data = Transcation::where('id', $request->input('id'))->firstOrFail();
        $data->status = $request->input('tipe');
        $data->save();
        return response()->json(['message' => 'Sukses']);
    }

    public function konfirmasi(Request $request)
    {
        $data = Transcation::where('id', $request->input('id'))->firstOrFail();
        $data->konfirmasi = 1;
        $data->save();

        return response()->json(['message' => 'Sukses!']);
    }

    public function filterDate(Request $request)
    {
        if ($request->start1) {
            $start_date = Carbon::parse($request->start1)->toDateTimeString();
            $end_date = Carbon::parse($request->end1)->toDateTimeString();
            if ($end_date == Carbon::today()) {
                $end_date = Carbon::now();
            }
            if ($request->toko && $request->toko != "all") {
                $history = Transcation::join('users', 'users.id', '=', 'user_id')->where('transcations.store', $request->toko)->whereBetween('transcations.created_at', [$start_date, $end_date])->orderBy('transcations.created_at', 'desc')->select('transcations.*', 'users.name as un')->get();
            } else {
                $history = Transcation::join('users', 'users.id', '=', 'user_id')->whereBetween('transcations.created_at', [$start_date, $end_date])->orderBy('transcations.created_at', 'desc')->select('transcations.*', 'users.name as un')->get();
            }
        } else {
            if ($request->toko == "all") {
                $history = Transcation::join('users', 'users.id', '=', 'user_id')->orderBy('transcations.created_at', 'desc')->select('transcations.*', 'users.name as un')->get();
            } else {
                $history = Transcation::join('users', 'users.id', '=', 'user_id')->where('transcations.store', $request->toko)->orderBy('transcations.created_at', 'desc')->select('transcations.*', 'users.name as un')->get();
            }
        }
        $tanggal[] = [];
        $total = 0;
        if ($history) {
            $total = number_format($history->sum('total'));
            foreach ($history as $key => $value) {
                $tanggal[$key] = $value->created_at->format('d, M Y');
            }
        }

        // return view('pos.history', compact('history'));
        return response()->json(['data' => $history, 'role' => Auth::user()->roles, 'tanggal' => $tanggal, 'total' => $total]);
    }

    public function filterStore(Request $request) //ini sekarang ga dipake
    {
        $history = Transcation::where('store', $request->toko)
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pos.history', compact("history"));
    }
    public function nota($id)
    {
        $transaction = Transcation::join('users', 'user_id', '=', 'users.id')->where('invoices_number', $id)->select('transcations.*', 'users.name as nk', 'users.email')->first();
        $products = ProductTranscation::join('products', 'product_transation.product_id', '=', 'products.id')->where('invoices_number', $id)->select('product_transation.*', 'products.name', 'products.price')->get();
        $pdf = app('dompdf.wrapper')->loadView('pos.nota', [
            'trx' => $transaction,
            'prd' => $products
        ]);
        return $pdf->stream('invoice.pdf');
    }

    public function sendEmail($id)
    {
        $count = User::select('email')->where('roles', 'Administrator')->count();
        $email = User::select('email')->where('roles', 'Administrator')->get();
        // echo "<pre>($email)</pre>";die;
        // $email = 'andrisyarif02@gmail.com';
        $transaction = Transcation::join('users', 'user_id', '=', 'users.id')->where('invoices_number', $id)->select('transcations.*', 'users.name as nk', 'users.email')->first();
        $products = ProductTranscation::join('products', 'product_transation.product_id', '=', 'products.id')->where('invoices_number', $id)->select('product_transation.*', 'products.name', 'products.price')->get();
        $data = array(
            'trx' => $transaction,
            'prd' => $products
        );
        $recipient = explode(',', $email);
        // echo print_r($recipient);die;
        $to = [];
        foreach ($email as $key => $value) {
            $to[$key] = $value->email;
            // echo print_r($to);die;

            // $to = ["andrisyarif02@gmail.com", "fadhylaa194@gmail.com", "ellafitrikusumaningrum@gmail.com", "syaddad46c@gmail.com"];       
        }
        Mail::send('pos.email_template', $data, function ($message) use ($to) {
            $message->to($to, 'no-reply')
                ->subject("Invoice");
            $message->from('optikindonesia12@gmail.com', 'Optik Indonesia');
        });
        if (Mail::failures()) {
            return "Gagall";
        }
        return redirect()->back();
    }

    public function createPDF(Request $request)
    {
        $history = Transcation::where('store', $request->toko)
        ->orderBy('created_at', 'desc');

        $pdf = \PDF::loadview('pos.history_pdf', ['history' => $history]);
        return $pdf->stream('hisitory-report-pdf');
    }
}
