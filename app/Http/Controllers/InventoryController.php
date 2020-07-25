<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\Inventory;
use App\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        $cek_invent = DB::table('inventory')->where('toko_id', $request->toko_id)->where('komoditas_id', $id)->whereDate('tanggal', Carbon::now())->first();

        if(empty($cek_invent))
        {
            $stok =  new Inventory();

            $stok->komoditas_id = $id;
            $stok->toko_id = $request->toko_id;
            $stok->qty_stok = $request->qty_stok;
            $stok->tanggal = Carbon::now();
            $stok->created_by = Auth::user()->id;

            $stok->save();
        } else {
            $invents = DB::table('inventory')->where('toko_id', $request->toko_id)->where('komoditas_id', $id)->whereDate('tanggal', Carbon::now())->update(['qty_stok' => request()->qty_stok]);
        }

        return redirect('/admin/komoditas');
    }
}
