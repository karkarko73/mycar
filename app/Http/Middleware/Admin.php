<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
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
        if(Auth::check()){
            if(auth()->user()->role == "admin"){
                return $next($request);
            }

            if(auth()->user()->role == "user"){
                return redirect('user/product');
            }
        }
        return redirect('/login');


    }
}
