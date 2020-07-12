<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\Inventory;
use App\User;
use Auth;

class InventoryController extends Controller
{
    public function stok($id)
    {
    	$komoditas = Komoditas::where('id_komoditas', $id)->first();
    	$toko = User::where('role', 2)->get();

    	return view('admin.inputstok', compact('komoditas', 'toko'));
    }

    public function storestok(Request $request, $id)
    {
        $stok =  new Inventory();

        $stok->komoditas_id = $id;
        $stok->toko_id = $request->toko_id;
        $stok->qty_stok = $request->qty_stok;
        $stok->created_by = Auth::user()->id;

        $stok->save();

        return redirect('/admin/komoditas');
    }
}
