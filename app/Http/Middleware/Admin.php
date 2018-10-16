<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        // if(Auth::user()->isSuperAdmin() || Auth::user()->isAdmin()) {
        //     return $next($request);
        // }

        if (Auth::user()->isAllowedToView(request()->route()->getName())) {
            return $next($request);
        }

        abort(403, 'Você não tem permissão para acessar esta área.');
    }
}
