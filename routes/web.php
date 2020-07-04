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

Route::get('/profile', 'UserController@edit')->name('profile')->middleware('user');
Route::post('/profile', 'UserController@update')->name('updateprofile')->middleware('user');

Route::delete('/admin/users/delete/{id}','UserController@destroy');

Route::get('/admin/pembeli', 'AdminController@indexpembeli')->name('adminpembeli')->middleware('admin');

Route::get('/admin/user/aktivasi/{id}', 'AdminController@aktivasipembeli')->name('aktivasi')->middleware('admin');

Route::get('/admin/komoditas', 'AdminController@createkomoditi')->name('adminkomoditas')->middleware('admin');
Route::get('/admin/komoditas', 'AdminController@indexkomoditi')->name('tabelkomoditas')->middleware('admin');
Route::get('/admin/komoditas/edit/{id}', 'AdminController@editkomoditi')->name('editkomoditas')->middleware('admin');
Route::post('/admin/komoditas', 'AdminController@storekomoditi')->name('insertkomoditas')->middleware('admin');
Route::post('/admin/komoditas/edit/{id}', 'AdminController@updatekomoditi')->middleware('admin');
Route::delete('/admin/komoditas/delete/{id}','AdminController@destroykomoditi');

Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/komoditas', 'KomoditasController@index')->name('komoditas')->middleware('user');

Route::get('/komoditas/show/{id}', 'KomoditasController@show')->middleware('user');

Route::get('/verifikasi', 'VerifikasiController@index')->name('verifikasi')->middleware('verifikasi');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('pesan/{id}','KomoditasController@index');
Route::post('pesan/{id}','PesanController@pesan');
Route::get('checkout', 'PesanController@checkout')->name('checkout');
Route::delete('checkout/{id}','PesanController@destroy');
Route::get('checkout/konfirmasi', "PesanController@konfirmasi");

Route::get('history', 'HistoryController@index')->name('history')->middleware('user');
Route::get('history/{id}', 'HistoryController@detail');

Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/toko/{id}', 'TokoController@ambil')->name('ambil')->middleware('toko');

Route::apiResource('users', 'UserController');
Route::apiResource('komoditas', 'KomoditasController');
Route::apiResource('toko', 'TokoController');

