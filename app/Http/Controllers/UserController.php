<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Komoditas;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $validator =[
            'password' => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8'
        ];
 
            $this->validate($request, $validator);

        DB::table('users')->where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/profile')->with('success','Berhasil Mengubah Profile');

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

}
