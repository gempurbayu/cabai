<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageManagerStatic as Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telepon' => ['required', 'string', 'max:255'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            //'ktp' => ['required','image','mimes:jpeg,png,jpg,gif','max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $request = app('request');
        if($request->hasfile('ktp')){
            $ktp = $request->file('ktp');
            $filename = time() . '.' . $ktp->getClientOriginalExtension();
            Image::make($ktp)->save( public_path('/ktp/' . $filename) );
        };
        if($request->hasfile('avatar')){
            $avatar = $request->file('avatar');
            $filename2 = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/avatar/' . $filename2) );
        };
    

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'telepon' => $data['telepon'],
            'kecamatan' => $data['kecamatan'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
            'ktp' => $filename,
            'avatar' => $filename2,
        ]);


        return redirect('verifikasi');

    }
}
