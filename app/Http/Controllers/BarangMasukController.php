<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\Inventory;
use App\BarangMasuk;
use App\User;
use Auth;
use Carbon\Carbon;

class BarangMasukController extends Controller
{


    public function __construct(){
        $this->middleware('admin');        
    }

    public function inputbarangmasuk($id)
    {
    	$komoditas = Komoditas::where('id_komoditas', $id)->first();
    	$toko = User::where('role', 2)->get();

    	return view('admin.barangmasuk', compact('komoditas', 'toko'));
    }

    public function storebarang(Request $request, $id)
    {
        $barangmasuk =  new BarangMasuk();

        $barangmasuk->komoditas_id = $id;
        $barangmasuk->qty_barangmasuk = $request->qty_barangmasuk;
        $barangmasuk->tgl_masuk = Carbon::now();
        $barangmasuk->toko_id = $request->toko_id;
        $barangmasuk->user_id = Auth::user()->id;

        $barangmasuk->save();

        return redirect('/admin/komoditas');
    }
}
