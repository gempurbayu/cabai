<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
     public function __construct(){
        $this->middleware('admin');        
    }

    public function laporanbarang()
    {
    	$barangs = DB::table("v_barangmasuk")->get();
    	$users = DB::table("users")->where('role', 2)->get();
    	$komoditas = DB::table("komoditas")->get();
  
        return view('admin.laporanbarang', compact('barangs','users','komoditas'));
    }

    public function laporanstok()
    {


    	$barangs = DB::table("v_stokupdate")->where('created', now()->month)->get();
    	$users = DB::table("users")->where('role', 2)->get();
    	$komoditas = DB::table("komoditas")->get();
  
        return view('admin.filterlaporanstok', compact('barangs','users','komoditas'));
    }

    public function filterstok(Request $request)
    {

    	$toko = $request->toko;

    	$barangs = DB::table("v_stokupdate")->where('created', now()->month)->where('toko_id', $toko)->get();
    	$users = DB::table("users")->where('role', 2)->get();
  
        return view('admin.filterlaporanstok', compact('barangs','users'));
    }

    public function filterbarang(Request $request)
    {

    	$toko = $request->toko;
    	$fkomoditas = $request->komoditas;

    	$barangs = DB::table("v_barangmasuk")->where('toko_id', $toko)->get();
    	$users = DB::table("users")->where('role', 2)->get();
    	$komoditas = DB::table("komoditas")->get();
  
        return view('admin.filterlaporanbarang', compact('barangs','users','komoditas'));
    }
}
