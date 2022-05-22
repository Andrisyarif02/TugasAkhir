<?php

namespace App\Http\Controllers;
//© 2020 Copyright: Tahu Coding
use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $roles = User::select('roles');
        // echo "<pre>"; print_r($roles); die;
        // session()->put('roles', $roles);
        return view('home');
    }

}
