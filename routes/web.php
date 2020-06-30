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


Auth::routes();

Route::get('/users/edit/{id}', 'UserController@edit');
Route::delete('/admin/users/delete/{id}','UserController@destroy');

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');

Route::get('/admin/komoditas', 'KomoditasController@create')->name('adminkomoditas')->middleware('admin');
Route::get('/admin/komoditas', 'KomoditasController@indexadm')->name('tabelkomoditas')->middleware('admin');
Route::get('/admin/komoditas/edit/{id}', 'KomoditasController@edit')->name('editkomoditas')->middleware('admin');
Route::post('/admin/komoditas', 'KomoditasController@store')->name('insertkomoditas')->middleware('admin');
Route::post('/admin/komoditas/edit/{id}', 'KomoditasController@update')->middleware('admin');
Route::delete('/admin/komoditas/delete/{id}','KomoditasController@destroy');

Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/komoditas', 'KomoditasController@index')->name('komoditas')->middleware('user');

Route::get('/komoditas/show/{id}', 'KomoditasController@show')->middleware('user');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pesan/{id}','KomoditasController@index');
Route::post('pesan/{id}','PesanController@pesan');
Route::get('checkout', 'PesanController@checkout');
Route::delete('checkout/{id}','PesanController@destroy');
Route::get('checkout/konfirmasi', "PesanController@konfirmasi");

Route::apiResource('users', 'UserController');
Route::apiResource('komoditas', 'KomoditasController');

