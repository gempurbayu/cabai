<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pesenan;
use App\PesananDetail;
use App\User;
use App\Komoditas;
use Illuminate\Support\Facades\DB;
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
    	$pesanan->status = 3;
    	$pesanan->update();

    	return redirect('toko');
    }

    public function detail($id)
    {
    	$pesanans = Pesenan::where('toko_id', $id)->orderBy('tanggal', 'asc')->get();
    	$pesanan = Pesenan::where('id', $id)->first();

        $alamat = DB::table('alamat_antars')->where('pesanan_id', $pesanan->id)->first();

        $pembeli = DB::table('users')->where('id', $pesanan->user_id)->first();

        if(!empty($alamat))
        {
        $kecamatan = DB::table('kecamatan')->where('kode_kecamatan', $alamat->kec_pembeli)->first();
        }

    	$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();

    	return view('toko.detail', compact('pesanans','pesanan', 'pesanan_details','alamat','pembeli','kecamatan'));
    }

    public function cancelorder(Request $request, $id)
    {
    	$pesanans = Pesenan::where('toko_id', $id)->orderBy('tanggal', 'asc')->get();
    	$pesanan = Pesenan::where('id', $id)->first();
    	$pesanan->keterangan =  $request->keterangan;
    	$pesanan->status = 4;
    	$pesanan->update();

    	return redirect('toko');
    }

    public function successorder(Request $request, $id)
    {
    	$pesanans = Pesenan::where('toko_id', $id)->orderBy('tanggal', 'asc')->get();
    	$pesanan = Pesenan::where('id', $id)->first();
    	$pesanan->keterangan =  $request->keterangan;
    	$pesanan->status = 3;
    	$pesanan->update();

    	return redirect('toko');
    }

    public function cancel($id)
    {
    	$pesanan = Pesenan::where('id', $id)->first();

    	return view('toko.cancelorder', compact('pesanan'));
    }

    public function success($id)
    {
    	$pesanan = Pesenan::where('id', $id)->first();

    	return view('toko.successorder', compact('pesanan'));
    }

    public function updatedetail($pid, $id)
    {
        $pesanan_detail = DB::table('pesanan_details')->where('id', $id)->first();
        $pesanan = DB::table('pesenans')->where('id', $pid)->first();

        return view('toko.updatedetail', compact('pesanan_detail','pesanan'));
    }

    public function storeupdatedetail(Request $request, $pid, $id)
    {
        $pesanan_detail = PesananDetail::where('id', $id)->first();
        $komoditas = Komoditas::where('id_komoditas', $pesanan_detail->komoditas_id)->first();
        $pesanan_detail->jumlah = $request->jumlah;
        $pesanan_detail->jumlah_harga = $komoditas->harga * $request->jumlah; 

        $pesanan_detail->update();

        $pesanan = Pesenan::where('id', $pid)->first();
        $jumlah_pesanan = PesananDetail::where('pesanan_id', $pesanan->id)->sum('jumlah_harga');
        $pesanan->jumlah_harga = $jumlah_pesanan;

        $pesanan->update();

        return redirect('toko/pesanan/detail/'. $pid);
    }

}
