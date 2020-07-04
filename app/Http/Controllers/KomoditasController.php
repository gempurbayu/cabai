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
        $komoditas = Komoditas::latest()->paginate(3);
  
        return view('users.index',compact('komoditas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        return view('users.komoditasshow',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
