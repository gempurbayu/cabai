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

        for($i = 1; $i < 31; $i++)
        {
            $label[]         = $i ;
        }
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




    // public function indexomset()
    // {

    //  $omset['omset'] = User::select(\DB::raw("COUNT(*) as count"))
    //                 ->whereYear('created_at', date('Y'))
    //                 ->groupBy(\DB::raw("Month(created_at)"))
    //                 ->pluck('count');
     
    //   return view('admin.grafikadmin', $omset);
    //}

}