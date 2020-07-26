<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        $this->middleware('user');


        
    }

  

    public function index()
    {
        $komoditas = Komoditas::latest()->get();
  
        return view('users.index',compact('komoditas'))     ;
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = DB::table('komoditas')->where('id_komoditas',$id)->first();
        $toko = DB::table('users')->where('role', 2)->get();
        $kecamatan = DB::table('kecamatan')->get();
        $stok = DB::table('v_stokupdate')->where('komoditas_id',$id)->paginate(6);
        return view('users.komoditasshow',compact('data','toko','stok','kecamatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
