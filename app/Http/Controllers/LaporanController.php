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
    	$fkomoditas = $request->komoditas;

    	if(($toko == 999) && ($fkomoditas == 999))
    	{
    			$barangs = DB::table("v_stokupdate")->where('created', now()->month)->get();
    	} else if($fkomoditas == 999) {
    		$barangs = DB::table("v_stokupdate")->where('created', now()->month)->where('toko_id', $toko)->get();
    	} else if($toko == 999) {
    		$barangs = DB::table("v_stokupdate")->where('created', now()->month)->where('komoditas_id', $fkomoditas)->get();
    	} else {
    		$barangs = DB::table("v_stokupdate")->where('created', now()->month)->where('toko_id', $toko)->where('komoditas_id', $fkomoditas)->get();
    	}

    	$users = DB::table("users")->where('role', 2)->get();
    	$komoditas = DB::table("komoditas")->get();
  
        return view('admin.filterlaporanstok', compact('barangs','users','komoditas'));
    }

    public function filterbarang(Request $request)
    {

    	$toko = $request->toko;
    	$fkomoditas = $request->komoditas;

    	if(($toko == 999) && ($fkomoditas == 999))
    	{
    		$barangs = DB::table("v_barangmasuk")->get();
    	} else if($fkomoditas == 999) {
    		$barangs = DB::table("v_barangmasuk")->where('toko_id', $toko)->get();
    	} else if($toko == 999) {
    		$barangs = DB::table("v_barangmasuk")->where('komoditas_id', $fkomoditas)->get();
    	} else {
    		$barangs = DB::table("v_barangmasuk")->where('toko_id', $toko)->where('komoditas_id', $fkomoditas)->get();
    	}

    	$users = DB::table("users")->where('role', 2)->get();
    	$komoditas = DB::table("komoditas")->get();
  
        return view('admin.filterlaporanbarang', compact('barangs','users','komoditas'));
    }
}
