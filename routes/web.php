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

Route::get('/admin/', 'ChartController@index')->name('admingrafik')->middleware('admin');
Route::get('/admin/omsetbulan', 'ChartController@omsetbulan')->name('omsetbulan')->middleware('admin');
Route::get('/admin/omsettahun', 'ChartController@omsettahun')->name('omsetbulan')->middleware('admin');
Route::get('/admin/bulan', 'ChartController@filter')->name('admingrafik')->middleware('admin');
Route::get('/admin/grafikuser', 'ChartController@guser')->name('admingrafik')->middleware('admin');
Route::get('/admin/grafikuserh', 'ChartController@guserh')->name('admingrafik')->middleware('admin');
Route::get('/admin/toko/baru', 'AdminController@registertoko')->name('buattoko')->middleware('admin');
Route::post('/admin/toko/baru', 'AdminController@storetoko')->name('storetoko')->middleware('admin');

Route::get('/admin/ongkir', 'AdminController@ongkir')->name('adminongkir')->middleware('admin');



Route::post('/admin/pesanan/filterstok', 'LaporanController@filterstok')->name('filterstoktoko')->middleware('admin');
Route::post('/admin/pesanan/filterbarang', 'LaporanController@filterbarang')->name('filterbarangtoko')->middleware('admin');



Route::get('/profile', 'UserController@edit')->name('profile')->middleware('user');
Route::post('/profile/update', 'UserController@update')->name('updateprofile')->middleware('user');

Route::delete('/admin/users/delete/{id}','UserController@destroy');

Route::get('/admin/pembeli', 'AdminController@indexpembeli')->name('adminpembeli')->middleware('admin');

Route::get('/admin/user/aktivasi/{id}', 'AdminController@aktivasipembeli')->name('aktivasi')->middleware('admin');
Route::get('/admin/user/nonaktif/{id}', 'AdminController@nonaktifpembeli')->name('nonaktif')->middleware('admin');

Route::get('/admin/komoditas', 'AdminController@createkomoditi')->name('adminkomoditas')->middleware('admin');
Route::get('/admin/komoditas', 'AdminController@indexkomoditi')->name('tabelkomoditas')->middleware('admin');
Route::get('/admin/komoditas/edit/{id}', 'AdminController@editkomoditi')->name('editkomoditas')->middleware('admin');
Route::post('/admin/komoditas', 'AdminController@storekomoditi')->name('insertkomoditas')->middleware('admin');
Route::post('/admin/komoditas/edit/{id}', 'AdminController@updatekomoditi')->middleware('admin');
Route::delete('/admin/komoditas/delete/{id}','AdminController@destroykomoditi');

Route::get('/admin/stok/{id}', 'InventoryController@stok')->middleware('admin');
Route::post('/admin/stok/{id}', 'InventoryController@storestok')->name('inputstok')->middleware('admin');

Route::get('/admin/barangmasuk/{id}', 'BarangMasukController@inputbarangmasuk')->middleware('admin');
Route::post('/admin/barangmasuk/{id}', 'BarangMasukController@storebarang')->name('inputbarangmasuk')->middleware('admin');
Route::get('/admin/laporan/barang', 'LaporanController@laporanbarang')->middleware('admin');
Route::get('/admin/laporan/stok', 'LaporanController@laporanstok')->middleware('admin');

Route::get('/admin/pesanan', 'AdminController@indexpesanan')->name('adminpesanan')->middleware('admin');
Route::get('/admin/pesanan/detail/{id}', 'AdminController@pesanandetail')->name('adminpesanandetail')->middleware('admin');
Route::post('/admin/pesanan/filter', 'AdminController@filterpesanan')->name('filterpesanan')->middleware('admin');

Route::get('/admin/toko', 'AdminController@indextoko')->name('admintoko')->middleware('admin');

Route::get('changeStatus', 'UserController@changeStatus');

Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/toko/pesanan/detail/{id}', 'TokoController@detail')->middleware('toko');
Route::post('/toko/pesanan/cancel/{id}', 'TokoController@cancelorder')->middleware('toko');
Route::get('/toko/pesanan/cancel/{id}', 'TokoController@cancel')->middleware('toko');
Route::post('/toko/pesanan/success/{id}', 'TokoController@successorder')->middleware('toko');
Route::get('/toko/pesanan/success/{id}', 'TokoController@success')->middleware('toko');
Route::get('/komoditas', 'KomoditasController@index')->name('komoditas')->middleware('user');

Route::get('/komoditas/show/{id}', 'KomoditasController@show')->middleware('user');

Route::get('/verifikasi', 'VerifikasiController@index')->name('verifikasi')->middleware('verifikasi');
Route::get('/home', 'VerifikasiController@index')->middleware('verifikasi');

Route::get('/about', 'HomeController@about')->name('about');
Route::get('/contact', 'HomeController@contact')->name('contact');

Route::get('pesan/{id}','KomoditasController@index');
Route::post('pesan/{id}','PesanController@pesan');
Route::get('checkout', 'PesanController@checkout')->name('checkout');
Route::post('checkout', 'PesanController@konfirmasi')->name('tglcheckout');
Route::post('checkout/alamat', 'PesanController@alamatantar')->name('alamatantar');
Route::delete('checkout/{id}','PesanController@destroy');
Route::get('checkout/konfirmasi', "PesanController@konfirmasi");

Route::get('history', 'HistoryController@index')->name('history')->middleware('user');
Route::get('history/{id}', 'HistoryController@detail');

Route::get('/toko', 'TokoController@index')->name('toko')->middleware('toko');
Route::get('/toko/pesanan/detail/{pid}/{id}', 'TokoController@updatedetail')->middleware('toko');
Route::post('/toko/pesanan/detail/{pid}/{id}', 'TokoController@storeupdatedetail')->name('updatedetail')->middleware('toko');
Route::get('/toko/{id}', 'TokoController@ambil')->name('ambil')->middleware('toko');

Route::get('/ongkir', 'OngkirController@index');
Route::post('/ongkir/cari', 'OngkirController@cariongkir');

Route::apiResource('users', 'UserController');
Route::apiResource('komoditas', 'KomoditasController');
Route::apiResource('toko', 'TokoController');

