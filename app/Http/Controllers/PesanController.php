<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\komoditas;
use App\Pesenan;
use App\PesananDetail;
use App\User;
use App\AlamatAntar;
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
        $this->middleware('user');
    }
    

    public function pesan(Request $request, $id){
        $komoditas = DB::table('komoditas')->where('id_komoditas',$id)->first();
        $user = User::where('id', Auth::user()->id)->first();

        $tanggal = Carbon::now();

        //validasi stok
        //if($request->jumlah_pesan > 10) {

          //  return redirect('komoditas/show/'.$id);
        // }

        $cek_pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status',0)->first();
        if(empty($cek_pesanan))
        {
            $pesanan = new Pesenan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->toko_id = 00;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->tanggal_ambil = Carbon::now();
            $pesanan->kode_transaksi = mt_rand(10000000, 99999999);
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
        $kecamatans = DB::table('kecamatan')->get();
        $toko = DB::table('users')->where('role', 2)->get();
        $pembeli = DB::table('users')->where('id', Auth::user()->id)->first();
        $alamatantar = DB::table('alamat_antars')->where('pesanan_id', $pesanan->id)->first();

        if(!empty($alamatantar))
        {
        $ongkir = DB::table('v_ongkir')->where('kec_toko', $alamatantar->kec_toko)->where('kec_pembeli', $alamatantar->kec_pembeli)->first();

        $toko_id = DB::table('users')->where('role', 2)->where('kecamatan', $alamatantar->kec_toko)->first();
        }

        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();


        }   
        return view('pesan.checkout', compact('pesanan','pesanan_details','kecamatans','toko','pembeli', '$alamatantar','ongkir','toko_id'));
    }

    public function alamatantar(Request $request)
    {
        $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();

        $cekalamat = AlamatAntar::where('pesanan_id', $pesanan->id)->first();
        if(empty($cekalamat))
        {
            $alamat = new AlamatAntar;
            $alamat->kec_pembeli = $request->kecamatanpembeli;
            $alamat->kec_toko = $request->kecamatantoko;
            $alamat->kelurahan = $request->kelurahan;
            $alamat->alamat = $request->alamat;
            $alamat->nohp = $request->nohp;
            $alamat->pesanan_id = $pesanan->id;
            $alamat->save();

            $toko = DB::table('users')->where('kecamatan',$request->kecamatantoko)->where('role', 2)->first();
            $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->toko_id = $toko->id;
            $pesanan->update();

        } else {
            $alamat = AlamatAntar::where('pesanan_id', $pesanan->id)->first();
            $alamat->kec_pembeli = $request->kecamatanpembeli;
            $alamat->kec_toko = $request->kecamatantoko;
            $alamat->kelurahan = $request->kelurahan;
            $alamat->alamat = $request->alamat;
            $alamat->nohp = $request->nohp;
            $alamat->pesanan_id = $pesanan->id;
            $alamat->update();

            $toko = DB::table('users')->where('kecamatan',$request->kecamatantoko)->where('role', 2)->first();
            $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();
            $pesanan->toko_id = $toko->id;
            $pesanan->update();
        }

        return redirect('checkout');
    }

    public function tglcheckout()
    {
        $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();



        return redirect('/history');
    }

    public function konfirmasi(Request $request)
    {
        $pesanan = Pesenan::where('user_id', Auth::user()->id)->where('status', 0)->first();
        $pesanan_id = $pesanan->id;
        $antar = DB::table('alamat_antars')->where('pesanan_id', $pesanan->id)->first();

        if(empty($antar))
        {
            $pesanan->status = 1;
        } else {
            $pesanan->status = 2;
        }
        $hari = date('Y-m-d'); 

        $hari = $request->hari;
        $pesanan->tanggal_ambil = $hari;
        $pesanan->toko_id = $request->toko;
        $pesanan->ongkir = $request->ongkir;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();

        return redirect('history');
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
