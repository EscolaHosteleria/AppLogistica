<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolProfeAlum
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->rol->rol == 'Professorat' || Auth::user()->rol->rol == 'Alumnat') {
            return $next($request);
        } else {
            return redirect()->action('App\Http\Controllers\HomeController@index');
        }
    }
}
