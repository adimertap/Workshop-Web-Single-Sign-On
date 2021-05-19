<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminServiceGabung
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
        if (Auth::user() && Auth::user()->role == 'admin_service_advisor' || Auth::user()->role == 'admin_service_instructor' || Auth::user()->role == 'owner') {
            return $next($request);
        }
        abort(403);
    }
}
