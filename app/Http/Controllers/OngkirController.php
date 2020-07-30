<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OngkirController extends Controller
{
    public function index()
    {
    	$kecamatan = DB::table('kecamatan')->get();
    	return view('ongkir',compact('kecamatan'));
    }

    public function cariongkir(Request $request)
    {

    	$kecamatan = DB::table('kecamatan')->get();

    	$kombinasi = DB::table('kombinasikec')->where('kec_toko', $request->kecamatan1)->where('kec_pembeli', $request->kecamatan2)->first();

    	$kec_toko = DB::table('kecamatan')->where('kode_kecamatan', $kombinasi->kec_toko)->first();

    	$kec_pembeli = DB::table('kecamatan')->where('kode_kecamatan', $kombinasi->kec_pembeli)->first();
    	$ongkir = DB::table('ongkir')->where('status', $kombinasi->status)->first();

    	return view('cariongkir',compact('kec_toko','kec_pembeli','ongkir','kecamatan'));
    }
}
