<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LogUserLogout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        if (Auth::User()) {
            Auth::user()->total_hours = 32;
            Auth::user()->save();

            
            //Auth::user()->total_hours
            Auth::logout();
        }else{
            Auth::user()->total_hours = 32;
            Auth::user()->save();

            
            //Auth::user()->total_hours
            Auth::logout();

        }
        return $next($request);
    }
}
