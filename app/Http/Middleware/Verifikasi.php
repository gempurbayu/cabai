<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Verifikasi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->status_id == 0 ){
            return $next($request);
        }

        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role == 1){
            return redirect('admin/pembeli');
        }

        if(Auth::user()->role == 2){
            return redirect()->route('toko');
        }

        if(Auth::user()->role == 3 ){
            return redirect('/komoditas');
        }

        return $next($request);
    }
}
