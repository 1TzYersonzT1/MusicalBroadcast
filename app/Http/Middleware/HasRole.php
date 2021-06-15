<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {

        if($role == 'organizador' && Auth::user()->is_organizador() != 1) {
            abort(403);
        }

        if($role == 'representante' && Auth::user()->is_representante() != 2) {
            abort(403);
        }

        if($role == 'administrador' && Auth::user()->is_administrador() != 3) {
            abort(403);
        }

        return $next($request);
    }
}
