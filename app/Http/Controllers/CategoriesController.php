<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function index()
    {
        $data_category = \App\Category::all();
        return view('category.index',['data_category'=> $data_category]);
    }

    //function untuk masuk ke view Tambah
    public function create()
    {
        return view('category/create');
    }

    //function untuk tambah
    public function tambah (Request $request)
    {
       $category = new Category();
       $category->nama   = $request->input('nama');
       $category->kode   = $request->input('kode');
       $category->save();
       return redirect('/category/index')->with("sukses", "Data Kategory Berhasil Ditambahkan");
    }

    //function untuk masuk ke view edit
    public function edit ($id_category)
    {
        $category = \App\Category::find($id_category);
        return view('category/edit',['category'=>$category]);
    }
    public function update (Request $request, $id_category)
    {
        $request->validate([
            'nama' => 'min:5',
            'kode' => 'max:2',
        ]);
        $category = \App\Category::find($id_category);
        $category->update($request->all());
        $category->save();
        return redirect('category/index') ->with('sukses','Data Kategory Berhasil Diedit');
    }

    //function untuk hapus
    public function delete($id_category)
    {
        $category=\App\Category::find($id_category);
        $category->delete();
        return redirect('category/index') ->with('sukses','Data Kategory Berhasil Dihapus');
    }
}
