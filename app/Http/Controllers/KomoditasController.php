<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komoditas;
use Illuminate\Support\Facades\DB;

class KomoditasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

  

    public function index()
    {
        $komoditas = Komoditas::latest()->paginate(5);
  
        return view('users.index',compact('komoditas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexadm()
    {
        $komoditas = Komoditas::latest()->paginate(5);
  
        return view('admin.komoditas',compact('komoditas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    

    public function create()
    {
        return view('admin.komoditas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $komoditas =  new Komoditas();

        $komoditas->nama_komoditas = $request->input('nama_komoditas');
        $komoditas->jenis = $request->input('jenis');
        $komoditas->harga = $request->input('harga');
        $komoditas->stok = $request->input('stok');

        if($request->hasfile('img_komoditas')) {
            $file = $request->file('img_komoditas');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('img_komoditas/', $filename);
            $komoditas->img_komoditas = $filename;
        } else {
            return $request;
            $komoditas->image = '';
        }

        $komoditas->save();

        return view('admin.komoditas')->with('komoditas', $komoditas);
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
