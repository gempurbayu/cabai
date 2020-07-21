<?php
  
namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
//use App\Models\User;

class ChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {


public function filter(Request $request){

        $month = 7;
        $month = $request->month;

        for($i = 1; $i < 31; $i++)
        {
            $label[]         = $i ;
        }
      
        
        for($bulan=1;$bulan < 31;$bulan++){
        $chartuser     = collect(DB::SELECT("SELECT count(id) AS jumlah from users where day(created_at)='$bulan' and month(created_at)= $month and role = 3"))->first();
        $jumlah_user[] = $chartuser->jumlah;
        }

        

        return view('admin.grafik',compact('jumlah_user','label', 'chartuser'));


    }
    
  
    public function index(Request $request){

       $omset = DB::table('omset')->select(DB::raw("jumlah as count"))
        ->get()
        ->toArray();

        $tanggal = DB::table('omset')->select(DB::raw("tanggal_ambil as tanggal"))
        ->get()
        ->toArray();

    $omset = array_column($omset, 'count');
    $tanggal = array_column($tanggal, 'tanggal');


    return view('admin.grafik')
            ->with('omset',json_encode($omset,JSON_NUMERIC_CHECK))
            ->with('tanggal',json_encode($tanggal,JSON_NUMERIC_CHECK));


    }

    public function omsetbulan(Request $request){

        $omsetbulan = DB::table('omsetbulan')->select(DB::raw("jumlah as countbulan"))
        ->get()
        ->toArray();

        $tanggalbulan = DB::table('omsetbulan')->select(DB::raw("bulan as tanggalbulan"))
        ->get()
        ->toArray();


    $omsetbulan = array_column($omsetbulan, 'countbulan');
    $tanggalbulan = array_column($tanggalbulan, 'tanggalbulan');

    return view('admin.omsetbulan')
            ->with('omsetbulan',json_encode($omsetbulan,JSON_NUMERIC_CHECK))
            ->with('tanggalbulan',json_encode($tanggalbulan,JSON_NUMERIC_CHECK));


    }

    public function omsettahun(Request $request){

        $omsettahun = DB::table('omsettahun')->select(DB::raw("jumlah as counttahun"))
        ->get()
        ->toArray();

        $tanggaltahun = DB::table('omsettahun')->select(DB::raw("tanggal_ambil as tanggaltahun"))
        ->get()
        ->toArray();


    $omsettahun = array_column($omsettahun, 'counttahun');
    $tanggaltahun = array_column($tanggaltahun, 'tanggaltahun');

    return view('admin.omsettahun')
            ->with('omsettahun',json_encode($omsettahun,JSON_NUMERIC_CHECK))
            ->with('tanggaltahun',json_encode($tanggaltahun,JSON_NUMERIC_CHECK));


    }

    public function guser(request $request){
        $days = "";
        $userr = "";
        for($i = 0; $i < 30; $i++) {
            $days .= "'".date("d M", strtotime('-'. $i .' days'))."',";

            $userr .=  "'".User::where('role', '=', '3')->whereDate('created_at', '=', date("Y-m-d", strtotime('-'. $i .' days')))->count()."',";
        }
    
        return view('admin.grafikuser',compact('days','userr'));
    }

    public function guserh(request $request){
        $label         = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        for($bulan=1;$bulan < 13;$bulan++){
        $chartuser     = collect(DB::SELECT("SELECT count(id) AS jumlah from users where month(created_at)='$bulan' and role = 3"))->first();
        $jumlah_user[] = $chartuser->jumlah;
        }


    return view('admin.grafikuserh',compact('jumlah_user','label', 'chartuser'));
    }




    // public function indexomset()
    // {

    //  $omset['omset'] = User::select(\DB::raw("COUNT(*) as count"))
    //                 ->whereYear('created_at', date('Y'))
    //                 ->groupBy(\DB::raw("Month(created_at)"))
    //                 ->pluck('count');
     
    //   return view('admin.grafikadmin', $omset);
    //}

}