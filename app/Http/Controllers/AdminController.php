<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Komoditas;
use App\PesananDetail;
use App\Pesenan;
use App\Inventory;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function coba(Request $request)
    {
        $totals = Pesenan::All();


        return view('admin.coba', compact('totals'));
    }

    public function indexpembeli()
    {

        $widget = User::latest()->get();
        $users = User::latest()->where('role', 3)->paginate(2);
  
        return view('admin.pembeli',compact('users','widget'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function indexgrafik()
    {
        
        return view('admin.grafik');
    }


    public function indexkomoditi()
    {
        $komoditas = Komoditas::latest()->paginate(3);

        $stoks = Inventory::latest()->get();
  
        return view('admin.komoditas',compact('komoditas', 'stoks'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function aktivasipembeli($id)
    {
        $pembeli = User::where('id', $id)->first();
        $pembeli->status_id = 1;
        $pembeli->update();

        return redirect('admin/pembeli');
    }

    public function nonaktifpembeli($id)
    {
        $pembeli = User::where('id', $id)->first();
        $pembeli->status_id = 0;
        $pembeli->update();

        return redirect('admin/pembeli');
    }

    

    public function createkomoditi()
    {
        return view('admin.komoditas');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storekomoditi(Request $request)
    {
        $komoditas =  new Komoditas();

        $komoditas->nama_komoditas = $request->input('nama_komoditas');
        $komoditas->jenis = $request->input('jenis');
        $komoditas->harga = $request->input('harga');

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

        return redirect('/admin/pembeli');
    }

    public function editkomoditi($id)
    {
        $komoditas = DB::table("komoditas")->where('id_komoditas', $id)->first();
  
        return view('admin.komoditasedit')->with('komoditas', $komoditas);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatekomoditi(Request $request, $id)
    {
        DB::table('komoditas')->where('id_komoditas', $id)->update([
            'nama_komoditas' => $request->nama_komoditas,
            'jenis' => $request->jenis,
            'harga' => $request->harga,
        ]);

        return redirect('/admin/komoditas');

    }


    public function indexpesanan()
    {
         $pesanans = Pesenan::Latest()->orderBy('tanggal', 'asc')->paginate(5);

  
        return view('admin.indexpesanan',compact('pesanans'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function pesanandetail($id)
    {
        $pesanans = Pesenan::Latest()->orderBy('tanggal', 'asc')->paginate(5);
        $pesanan = Pesenan::where('id', $id)->first();
        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

        return view('admin.detailpesanan', compact('pesanans','pesanan', 'pesanan_details'));
    }

    public function filterpesanan(Request $request)
    {
        $pesanan = Pesenan::Latest();

        $status = $request->status;
        $pesanans = Pesenan::where('status', $status)->orderBy('tanggal', 'asc')->paginate(5);

        return view('admin.indexpesanan', compact('pesanan','pesanans'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroykomoditi($id)
    {
        $komoditas = DB::table('komoditas')->where('id_komoditas', $id)->get();
        $komoditas->delete();
        return redirect('/admin/komoditas');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //delete pembeli
        $user = User::find($id);
        $user->delete();
        return redirect('/admin')->with('success', 'Contact deleted!');
    }


    public function indextoko()
    {
        $tokos = User::where('role', 2)->paginate(5);
        return view('admin.toko', compact('tokos'));
    }
}
