<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| <!-- © 2020 Copyright: Tahu Coding -->
*/

Route::get('/', function () {
    return view('auth.login');
    // echo "<pre>";
    // print_r(Auth::user());
});

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/products', 'ProductController');
    Route::post('/products-filter', 'ProductController@index')->name('product-filter');

    Route::get('/transcation', 'TransactionController@index');
    Route::post('/transcation-filter', 'TransactionController@index')->name('trafil');

    Route::post('/transcation/addproduct/{id}', 'TransactionController@addProductCart');
    Route::post('/transcation/removeproduct/{id}', 'TransactionController@removeProductCart');

    Route::post('/transcation/clear', 'TransactionController@clear');
    Route::post('/transcation/increasecart/{id}', 'TransactionController@increasecart');
    Route::post('/transcation/decreasecart/{id}', 'TransactionController@decreasecart');
    Route::post('/transcation/bayar', 'TransactionController@bayar');
    Route::get('/transcation/history', 'TransactionController@history');
    Route::get('/transcation/history/history_pdf', 'TransactionController@createPDF');
    Route::get('/transcation/laporan/{id}', 'TransactionController@laporan');
    Route::post('/transaction/ubah-status', 'TransactionController@ubahStatus');
    Route::post('/transaction/konfirmasi', 'TransactionController@konfirmasi');
    // Route::post('/transaction/filter-date', 'TransactionController@filterDate')->name('history-filter');
    Route::match(['post', 'get'], '/transcation/filter-date', 'TransactionController@filterDate')->name('history-filter');
    Route::match(['post', 'get'], '/transcation/filter-store', 'TransactionController@filterStore')->name('history-filter-store');//ini juga ga dipake

    Route::get('/categoris/{id}', 'TransactionController@filter');

    Route::get('/category', 'CategoriesController@index');
    Route::get('/category/index', 'CategoriesController@index');
    Route::get('/category/create', 'CategoriesController@create');
    Route::post('/category/tambah', 'CategoriesController@tambah');
    Route::get('/category/{id}/edit', 'CategoriesController@edit');
    Route::post('/category/{id}/update', 'CategoriesController@update');
    Route::get('/category/{id}/delete', 'CategoriesController@delete');

    Route::get('/user', 'UserController@index');
    Route::get('/user/index', 'UserController@index');
    Route::get('/user/create', 'UserController@create');
    Route::post('/user/tambah', 'UserController@tambah');
    Route::get('/user/{id}/edit', 'UserController@edit');
    Route::post('/user/{id}/update', 'UserController@update');
    Route::get('/user/{id}/delete', 'UserController@delete');

    Route::get('/nota/{id}', 'TransactionController@nota')->name('nota');
    Route::get('/transaction/email/{id}', 'TransactionController@sendEmail')->name('email');
});
