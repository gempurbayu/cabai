<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\Pesenan;
use App\PesananDetail;
use App\User;
use Auth;
use Alert;


class HistoryController extends Controller
{
    public function __construct()
    {
    	$this->middleware('user');
    }

    public function index()
    {
    	$pesanans = Pesenan::where('user_id', Auth::user()->id)->where('status', 1)->get();

    	return view('history.index', compact('pesanans'));
    }

    public function detail($id)
    {
    	$pesanan = Pesenan::where('id', $id)->first();
    	$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

    	return view('history.detail', compact('pesanan', 'pesanan_details'));
    }
}
