<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class User
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
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->status_id == 0 ){
            return redirect('/verifikasi');
        }

        if(Auth::user()->role == 1){
            return redirect('admin/pembeli');
        }

        if(Auth::user()->role == 2){
            return redirect('/toko');
        }

        if(Auth::user()->role == 3 ){
            return $next($request);
        }

        return $next($request);
    }
}
