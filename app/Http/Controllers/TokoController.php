<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesenan;
use App\User;
use Auth;

class TokoController extends Controller
{

	public function __construct(){
        $this->middleware('toko');
    }

    public function index()
    {

    	$toko = User::where('id', Auth::user()->id)->first();

    	$id = $toko->id;

         $pesanans = Pesenan::where('toko_id', $id)->orderBy('tanggal', 'asc')->get();

  
        return view('toko.index',compact('pesanans','kecamatan','user','id'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function ambil($id)
    {
    	$pesanan = Pesenan::where('id', $id)->first();
    	$pesanan->status = 2;
    	$pesanan->update();

    	return redirect('toko');
    }
}
