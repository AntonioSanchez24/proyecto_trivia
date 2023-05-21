<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Rol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     public function handle(Request $request, Closure $next){
        if (Auth::user() && Auth::user()->rol == 'admin' || Auth::user() && Auth::user()->rol == 'moderador' ) {
            return $next($request);
        }

        return redirect()->route('dashboard'); // If user is not an admin.
     }

}