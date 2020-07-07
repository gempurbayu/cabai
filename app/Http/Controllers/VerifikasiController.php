<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verifikasi');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.verifikasi');
    }
}
