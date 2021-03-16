<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolAdminEcoAlum
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
        if (Auth::user()->rol->rol != 'Professorat') {
            return $next($request);
        } else {
            notify()->error('No tens accés a aquest apartat del web, contacta amb l\'administrador.');
            return redirect()->action('App\Http\Controllers\HomeController@index');
        }
    }
}
