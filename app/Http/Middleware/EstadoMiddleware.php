<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EstadoMiddleware
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
        if(Auth::check() && Auth::user()->Estado == '1')
        return $next($request);
        else 
        Auth::logout();
        return redirect('/')->with('mensaje','Cuenta inactiva esperar a administrador');
    }
}
