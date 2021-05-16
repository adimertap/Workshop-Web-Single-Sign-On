<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminServiceInstructor
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
        if (Auth::user() && Auth::user()->role == 'admin_service_instructor' || Auth::user()->role == 'owner' || Auth::user()->role == 'admin_service_advisor') {
            return $next($request);
        }
        abort(403);
    }
}
