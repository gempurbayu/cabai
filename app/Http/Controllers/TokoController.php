<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesenan;
use App\User;
use Auth;

class TokoController extends Controller
{
    public function index()
    {
    	$toko = User::where('id', Auth::user()->id)->get();
    	$user = User::where('kecamatan', $toko->kecamatan)->get();
         $pesanans = Pesenan::where('user_id', $user->id)->paginate(5);
  
        return view('toko.index',compact('pesanans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
