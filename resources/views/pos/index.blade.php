@extends('layouts.app')
@section('content')
    {{-- @include('pos.filterJS' ) --}}
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="min-height:85vh">
                    <div class="card-header bg-white">
                        {{-- <form action="coba" method="GET">
                        <div class="col text-right" >
                            <div class="col text-right">
                                <select name="cat" id="categories" class="form-control from-control-sm" style="font-size: 12px">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->nama }}">{{$cat->nama}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="col-sm-3">
                                <button class="btn btn-danger btn-sm">GO</button>

                            </div>
                        </div>
                    </form> --}}

                        <div class="row">
                            <div class="col">
                                <h4 class="font-weight-bold">Products</h4>
                            </div>
                            <div class="col text-right">
                                <select name="cat" id="categories" class="form-control from-control-sm"
                                    style="font-size: 12px">
                                    <option value="all">All</option>
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat->nama }}">{{ $cat->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div class="col text-right">
                                <select name="store" id="store" class="form-control from-control-sm"
                                    style="font-size: 12px">
                                    <option value="Tlogomas" selected>Tlogomas</option>
                                    <option value="Joyo Grand">Joyo Grand</option>
                                    <option value="Singasari">Singasari</option>
                                </select>
                            </div> --}}
                            <div class="col"><input type="text" id="search" name="search"
                                    class="form-control form-control-sm col-sm-12 float-right"
                                    placeholder="Search Product..."></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row" style="margin-left: 1px; margin-right: 1px" id="tempatt">
                            @foreach ($products as $product)
                                <div style="border:3px solid rgb(228, 228, 228)" class="col-sm-3 mb-3">
                                    <div class="productCard" id="productCard">
                                        <div class="view overlay">
                                            <form action="{{ url('/transcation/addproduct', $product->id) }}" method="POST">
                                                @csrf
                                                @if ($product->qty == 0)
                                                    <img class="card-img-top gambar" src="{{ $product->image }}"
                                                        alt="Card image cap">
                                                    <button class="btn btn-danger btn-sm cart-btn disabled"><i
                                                            class="fas fa-cart-plus"></i></button>
                                                @else
                                                    <img class="card-img-top gambar" src="{{ $product->image }}"
                                                        alt="Card image cap" style="cursor: pointer">
                                                    <button type="submit" class="btn btn-danger btn-sm cart-btn"><i
                                                            class="fas fa-cart-plus"></i></button>
                                                @endif
                                            </form>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-center font-weight-bold">
                                                {{ Str::words($product->name, 4) }}</p>
                                            <p class="card-text text-center"> Quantity : {{ $product->qty }}</p>
                                            <p class="card-text text-center">Rp.
                                                {{ number_format($product->price, 2, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card" style="min-height:85vh">
                    <div class="card-header bg-white">
                        <div class="row">
                            <div class="col-sm-4">
                                <h4 class="font-weight-bold">Cart</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div style="overflow-y:auto;min-height:53vh;max-height:53vh" class="mb-3">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th width="10%">No</th>
                                        <th width="30%">Nama Product</th>
                                        <th width="30%">Qty</th>
                                        <th width="30%" class="text-right">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @forelse($cart_data as $index=>$item)
                                        <tr>
                                            <td>
                                                <form action="{{ url('/transcation/removeproduct', $item['rowId']) }}"
                                                    method="POST">
                                                    @csrf
                                                    {{ $no++ }} <br><a
                                                        onclick="this.closest('form').submit();return false;"><i
                                                            class="fas fa-trash" style="color: rgb(134, 134, 134)"></i></a>
                                                </form>
                                            </td>
                                            <td>{{ Str::words($item['name'], 3) }} <br>Rp.
                                                {{ number_format($item['pricesingle'], 2, ',', '.') }}
                                            </td>
                                            <td class="font-weight-bold">
                                                <form action="{{ url('/transcation/decreasecart', $item['rowId']) }}"
                                                    method="POST" style='display:inline;'>
                                                    @csrf
                                                    <button class="btn btn-sm btn-info"
                                                        style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                            class="fas fa-minus"></i></button>
                                                </form>
                                                <a style="display: inline">{{ $item['qty'] }}</a>
                                                <form action="{{ url('/transcation/increasecart', $item['rowId']) }}"
                                                    method="POST" style='display:inline;'>
                                                    @csrf
                                                    <button class="btn btn-sm btn-primary"
                                                        style="display: inline;padding:0.4rem 0.6rem!important"><i
                                                            class="fas fa-plus"></i></button>
                                                </form>
                                            </td>
                                            <td class="text-right">Rp. {{ number_format($item['price'], 2, ',', '.') }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center">Empty Cart</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="60%">Sub Total</th>
                                <th width="40%" class="text-right">Rp.
                                    {{ number_format($data_total['sub_total'], 2, ',', '.') }} </th>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <th class="text-right font-weight-bold">Rp.
                                    {{ number_format($data_total['total'], 2, ',', '.') }}</th>
                            </tr>
                        </table>
                        <div class="row">
                            <div class="col-sm-4">
                                <form action="{{ url('/transcation/clear') }}" method="POST">
                                    @csrf
                                    <button class="btn btn-info btn-lg btn-block" style="padding:1rem!important"
                                        onclick="return confirm('Apakah anda yakin ingin meng-clear cart ?');"
                                        type="submit">Clear</button>
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <a class="btn btn-primary btn-lg btn-block" style="padding:1rem!important"
                                    href="{{ url('/transcation/history') }}" target="_blank">History</a>
                            </div>
                            <div class="col-sm-4">
                                <button class="btn btn-success btn-lg btn-block" style="padding:1rem!important"
                                    data-toggle="modal" data-target="#fullHeightModalRight">Pay</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade right" id="fullHeightModalRight" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">

            <!-- Add class .modal-full-height and then add class .modal-right (or other classes from list above) to set a position to the modal -->
            <div class="modal-dialog modal-full-height modal-right" role="document">
                <div class="modal-content">
                    <div class="modal-header red">
                        <h6 class="modal-title w-100 text-light" id="myModalLabel">Transaksi Pembayaran</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table table-sm table-borderless">
                            <tr>
                                <th width="60%">Sub Total</th>
                                <th width="40%" class="text-right">Rp.
                                    {{ number_format($data_total['sub_total'], 2, ',', '.') }} </th>
                            </tr>
                        </table>
                        <form action="{{ url('/transcation/bayar') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Customer</label>
                                <input id="name" class="form-control" type="text" name="name" autofocus />
                            </div>
                            <div class="form-group">
                                <label for="number">Nomor Hp</label>
                                <input id="number" class="form-control" type="number" name="number" autofocus />
                            </div>
                            <div class="form-group">
                                <label for="oke">Potongan (%)</label>
                                <input id="potongan" class="form-control" type="number" name="potongan" value="0" autofocus />
                            </div>
                            <div class="form-group">
                                <label for="oke">Input Nominal</label>
                                <input id="oke" class="form-control" type="number" name="bayar" autofocus />
                            </div>
                            <h5 class="font-weight-bold">Total:</h5>
                            <h3 class="font-weight-bold mb-3" id="datatotal">Rp.
                                {{ number_format($data_total['total'], 2, ',', '.') }}</h3>
                            <input id="totalHidden" type="hidden" name="totalHidden" value="{{ $data_total['total'] }}" />

                            <h5 class="font-weight-bold">potongan:</h5>
                            <h3 class="font-weight-bold mb-3" id="pot"></h3>

                            <h5 class="font-weight-bold">Bayar:</h5>
                            <h3 class="font-weight-bold mb-3" id="pembayaran"></h3>

                            <h5 class="font-weight-bold text-primary">Kembalian:</h5>
                            <h3 class="font-weight-bold text-primary" id="kembalian"></h3>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveButton" disabled
                            onClick="openWindowReload(this)">Save transcation</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
    @push('script')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        @if (Session::has('error'))
            <script>
                toastr.error(
                    'Telah mencapai jumlah maximum Product | Silahkan tambah stock Product terlebih dahulu untuk menambahkan'
                )

            </script>
        @endif

        @if (Session::has('errorTransaksi'))
            <script>
                toastr.error(
                    'Transaksi tidak valid | perhatikan jumlah pembayaran | cek jumlah product'
                )

            </script>
        @endif

        @if (Session::has('success'))
            <script>
                toastr.success(
                    'Transaksi berhasil Disimpan'
                );
                window.open('<?= route("nota", Session::get("inv")) ?>', '_blank');

            </script>
        @endif

        <script>


        </script>

    @endpush

    @push('script')
        <script>
            $(document).ready(function() {
                $('#fullHeightModalRight').on('shown.bs.modal', function() {
                    $('#oke').trigger('focus');
                });
            });

            oke.oninput = function() {
                let pot = parseInt(document.getElementById('potongan').value) ? parseInt(document.getElementById(
                    'potongan').value) : 0;
                let jumlah1 = parseInt(" <?= $data_total['total'] ?> ");
                let jumlah = jumlah1 - (jumlah1 * pot / 100);
                let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke')
                    .value) : 0;
                let hasil = bayar - jumlah;
                $('#totalHidden').val(jumlah);
                $('#pot').html('Rp '+rupiah(jumlah1 * pot / 100)+',00');
                document.getElementById("datatotal").innerHTML = jumlah ? 'Rp ' + rupiah(jumlah) + ',00' : 'Rp ' + 0 +
                    ',00';
                document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 +
                    ',00';
                document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
                    ',00';

                cek(bayar, jumlah);
                const saveButton = document.getElementById("saveButton");

                if (jumlah === 0) {
                    saveButton.disabled = true;
                }

            };
            potongan.oninput = function() {
                let pot = parseInt(document.getElementById('potongan').value) ? parseInt(document.getElementById(
                    'potongan').value) : 0;
                let jumlah1 = parseInt(" <?= $data_total['total'] ?> ");
                let jumlah = jumlah1 - (jumlah1 * pot / 100);
                let bayar = parseInt(document.getElementById('oke').value) ? parseInt(document.getElementById('oke')
                    .value) : 0;
                let hasil = bayar - jumlah;
                $('#totalHidden').val(jumlah);
                $('#pot').html('Rp '+rupiah(jumlah1 * pot / 100)+',00');
                document.getElementById("datatotal").innerHTML = jumlah ? 'Rp ' + rupiah(jumlah) + ',00' : 'Rp ' + 0 +
                    ',00';
                document.getElementById("pembayaran").innerHTML = bayar ? 'Rp ' + rupiah(bayar) + ',00' : 'Rp ' + 0 +
                    ',00';
                document.getElementById("kembalian").innerHTML = hasil ? 'Rp ' + rupiah(hasil) + ',00' : 'Rp ' + 0 +
                    ',00';

                cek(bayar, jumlah);
                const saveButton = document.getElementById("saveButton");

                if (jumlah === 0) {
                    saveButton.disabled = true;
                }

            };

            function cek(bayar, jumlah) {
                const saveButton = document.getElementById("saveButton");

                if (bayar < jumlah) {
                    saveButton.disabled = true;
                } else {
                    saveButton.disabled = false;
                }
            }

            function rupiah(bilangan) {
                var number_string = bilangan.toString(),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{1,3}/gi);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                return rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            }
            let csrf_token = $('meta[name="csrf-token"]').attr('content');

            $(document).ready(function() {
                function addcart(id) {
                    $.ajax({
                        url: "<?= url('/transcation/addproduct') ?>/" + id,
                        type: "POST",
                        data: {
                            "_token": csrf_token,
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {

                        }
                    });
                }

                function ajaxx() {
                    cat = $('#categories').val();
                    search = $('#search').val();
                    store = $('#store').val();
                    $.ajax({
                        url: "<?= route('trafil') ?>",
                        type: "POST",
                        data: {
                            "cat": cat,
                            "search": search,
                            "store" : store,
                            "_token": csrf_token
                        },
                        async: false,
                        dataType: 'json',
                        success: function(data) {
                            var html = '';
                            var i;
                            if (data[0].name) {
                                for (i = 0; i < data.length; i++) {
                                    var urla =
                                        "<?= url('/transcation/addproduct') ?>/" + data[
                                            i]['id'];
                                    html +=
                                        '<div style="border:3px solid rgb(228, 228, 228)" class="col-sm-3 mb-3"><div class="productCard" id="productCard"><div class="view overlay"> <form action="' +
                                        urla +
                                        '" method="POST"><input type="hidden" name="_token" value="' +
                                        csrf_token + '">';
                                    if (data[i]['qty'] == 0) {
                                        html += '<img class="card-img-top gambar" src="' + data[i][
                                                'img'] +
                                            '" alt="Card image cap"> <button class="btn btn-danger btn-sm cart-btn disabled"><i class="fas fa-cart-plus"></i></button>';
                                    } else {
                                        html += '<img class="card-img-top gambar" src="' + data[i][
                                                'img'] +
                                            '" alt="Card image cap" style="cursor: pointer" > <button type="submit" id="submit" class="btn btn-danger btn-sm cart-btn" ><i class="fas fa-cart-plus"></i></button>';
                                    }
                                    html +=
                                        '</form></div><div class="card-body"><p class="card-text text-center font-weight-bold">' +
                                        data[i]['name'] +
                                        '</p><p class="card-text text-center"> Quantity : ' + data[i][
                                            'qty'
                                        ] + '</p><p class="card-text text-center">Rp. ' + data[i][
                                            'price'
                                        ] + '</p></div></div></div>';
                                }
                            }
                            $('#tempatt').html(html);
                        },
                    });
                }

                $('#categories').change(function() {
                    ajaxx();
                });
                $('#store').change(function() {
                    ajaxx();
                });
                $('#search').change(function() {
                    ajaxx();
                });
            })

        </script>
    @endpush


    @push('style')
        <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
        <style>
            .gambar {
                width: 100%;
                height: 175px;
                padding: 0.9rem 0.9rem
            }

            @media only screen and (max-width: 600px) {
                .gambar {
                    width: 100%;
                    height: 100%;
                    padding: 0.9rem 0.9rem
                }
            }

            html {
                overflow: scroll;
                overflow-x: hidden;
            }

            ::-webkit-scrollbar {
                width: 0px;
                /* Remove scrollbar space */
                background: transparent;
                /* Optional: just make scrollbar invisible */
            }

            /* Optional: show position indicator in red */
            ::-webkit-scrollbar-thumb {
                background: #FF0000;
            }

            .cart-btn {
                position: absolute;
                display: block;
                top: 5%;
                right: 5%;
                cursor: pointer;
                transition: all 0.3s linear;
                padding: 0.6rem 0.8rem !important;

            }

            .productCard {
                cursor: pointer;

            }

            .productCard:hover {
                border: solid 1px rgb(172, 172, 172);

            }

        </style>
    @endpush
