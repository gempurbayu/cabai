<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Komoditas;
use Illuminate\Support\Facades\DB;
use Auth;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index()
    {
        
    }
  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
        return view('about');
    }
   
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
    }
   
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(){


        $user = User::where('id', Auth::user()->id)->first();
        return view('users.profile', compact('user'));

    }

    public function update(Request $request)
    {
        DB::table('users')->where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => $request->password,
        ]);

        return redirect('/profile');

    }

    public function profile()
    {
        $profile =  User::where('id', Auth::user()->id)->first();
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect('/admin');
    }

    public function changeStatus(Request $request)
    {
        $users = User::find($request->id);
        $users->status = $request->status;
        $users->save();
  
        return response()->json(['success'=>'Status change successfully.']);
    }
}
