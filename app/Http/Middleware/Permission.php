<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Permission
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
        if (Auth::user()->isAllowedToView(request()->route()->getName())) {
            return $next($request);
        }

        abort(403, 'Você não tem permissão para acessar esta área.');
    }
}
