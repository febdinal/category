<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/produk' , 'BEController@index');

Route::get('/produk/ajax','BEController@showData');

Route::post('/produk/new','BEController@newproduk');

Route::post('/produk/hapus/{id}','BEController@hapus')
      ->name('delete');
