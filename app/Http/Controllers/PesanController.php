<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\komoditas;
use App\Pesenan;
use App\PesananDetail;
use Carbon\Carbon;
use Alert;
use Illuminate\Support\Facades\DB;
use Jenssegers\Date\Date;

class PesanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    

    public function pesan(Request $request, $id){
        $komoditas = DB::table('komoditas')->where('id_komoditas',$id)->first();

        $tanggal = Carbon::now();
        $tanggal_ambil = Date::now()->add('3 day')->format('j F Y');

        //validasi stok
        if($request->jumlah_pesan > 10) {

            return redirect('komoditas/show/'.$id);
        }

        $cek_pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesenan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode_transaksi = mt_rand(10000000, 99999999);
            $pesanan->tanggal_ambil = $tanggal_ambil;
            $pesanan->save();
        }

        $pesanan_baru = Pesenan::where('user_id', Auth::user()->id)->where('status',0)->first();

        $cek_pesanan_detail = PesananDetail::where('komoditas_id',$komoditas->id_komoditas)->where('pesanan_id',$pesanan_baru->id)->first();

        if(empty($cek_pesanan_detail))
        {

                $pesanan_detail =  new PesananDetail;
                $pesanan_detail->komoditas_id = $komoditas->id_komoditas;
                $pesanan_detail->pesanan_id = $pesanan_baru->id;
                $pesanan_detail->jumlah = $request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $komoditas->harga*$request->jumlah_pesan;
                $pesanan_detail->save();
            } else {
                $pesanan_detail = PesananDetail::where('komoditas_id',$komoditas->id_komoditas)->where('pesanan_id',$pesanan_baru->id)->first();

                $pesanan_detail->jumlah = $request->jumlah_pesan;

                $harga_pesanan_detail_baru = $komoditas->harga*$request->jumlah_pesan;
                $pesanan_detail->jumlah_harga = $harga_pesanan_detail_baru;
                $pesanan_detail->update();
            }

            //jumlah total
            $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status',0)->first();

            $jumlah_pesanan = PesananDetail::where('pesanan_id', $pesanan->id)->sum('jumlah_harga');
            $pesanan->jumlah_harga = $jumlah_pesanan;
            $pesanan->update();

        Alert::success('Pesanan Berhasil Masuk Keranjang', 'Success');
       return redirect('checkout');

    }

    public function checkout()
    {
        $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }   
        return view('pesan.checkout', compact('pesanan','pesanan_details'));
    }

    public function konfirmasi()
    {
        $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach($pesanan_details as $pesanan_detail) {
            $komoditas = Komoditas::where('id_komoditas', $pesanan_detail->komoditas_id)->first();
            $komoditas->stok = $komoditas->stok-$pesanan_detail->jumlah;
            $komoditas->update();
        }

        return redirect('komoditas');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $pesanan_detail = PesananDetail::where('id',$id)->first();

        $pesanan = Pesenan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();

        $pesanan_detail->delete();
        Alert::error('Pesanan Sukses Dihapus', 'Hapus');
        return redirect('checkout');
    }
}
