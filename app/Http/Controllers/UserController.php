<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

class UserController extends Controller
{
    public function index()
    {
        $data_user= \App\User::all();
        return view('user/index', ['data_user' => $data_user]);
    }

    //function untuk masuk ke view Tambah
    public function create()
    {
        return view('user/create');
    }

    //function untuk tambah
    public function tambah (Request $request)
    {
       $user = new User();
       $user->name = $request->input('name');
       $user->email   = $request->input('email');
       $user->password   = Hash::make($request->input('password'));
       $user->roles   = $request->input('roles');
       $user->store   = $request->input('store');

       $user->save();
       return redirect('/user/index')->with("sukses", "Data User Berhasil Ditambahkan");
    }

    //function untuk masuk ke view edit
    public function edit ($id_user)
    {
        $user = \App\User::find($id_user);
        return view('user/edit',['user'=>$user]);
    }
    public function update (Request $request, $id_user)
    {
        // $request->validate([
        //     'name' => 'min:5',
        //     'email' => 'max:2',
        // ]);
        $user = \App\User::find($id_user);
        $user->update($request->all());
        $user->save();
        return redirect('user/index') ->with('sukses','Data User Berhasil Diedit');
    }

    //function untuk hapus
    public function delete($id_user)
    {
        $user=\App\User::find($id_user);
        $user->delete();
        return redirect('user/index') ->with('sukses','Data User Berhasil Dihapus');
    }
}
