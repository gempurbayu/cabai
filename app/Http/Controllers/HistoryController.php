<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\Pesenan;
use App\PesananDetail;
use App\User;
use Auth;
use Alert;
use Illuminate\Support\Facades\DB;


class HistoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('user');
    }

    public function index()
    {
    	$pesanans = Pesenan::where('user_id', Auth::user()->id)->orderBy('id','DESC')->get();
        $toko = User::where('role', 2)->get();
    	return view('history.index', compact('pesanans','toko'));
    }

    public function detail($id)
    {
    	$pesanan = Pesenan::where('id', $id)->first();
    	$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $toko = DB::table('kecamatan')->where('kode_kecamatan',$pesanan->toko->kecamatan)->first();

    	return view('history.detail', compact('pesanan', 'pesanan_details','toko'));
    }
}
