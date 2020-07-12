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
    	$users = DB::table("users")->get();
  
        return view('admin.laporanbarang', compact('barangs','users'));
    }

    public function laporanstok()
    {
    	$barangs = DB::table("v_inventory")->get();
    	$users = DB::table("users")->get();
  
        return view('admin.laporanstok', compact('barangs','users'));
    }
}
