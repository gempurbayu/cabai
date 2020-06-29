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

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/admin/komoditas', 'KomoditasController@create')->name('adminkomoditas')->middleware('admin');
Route::get('/admin/komoditas', 'KomoditasController@indexadm')->name('tabelkomoditas')->middleware('admin');
Route::post('/admin/komoditas', 'KomoditasController@store')->name('insertkomoditas')->middleware('admin');
Route::get('/pegawai', 'PegawaiController@index');
Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/komoditas', 'KomoditasController@index')->name('user')->middleware('user');
Route::get('/komoditas/show/{id}', 'KomoditasController@show')->middleware('user');

Route::get('/home', 'HomeController@index')->name('home');

Route::apiResource('users', 'UserController');
Route::apiResource('komoditas', 'KomoditasController');

