<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class user
{

    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            if(auth()->user()->role == "user"){
                return $next($request);
                // return redirect('user/product');
            }
            return redirect('/');
        }

        return redirect('/login');
    }
}
