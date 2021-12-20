<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class isAdminServiceAdvisor
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
        if (Auth::user() && Auth::user()->hasRole('Aplikasi Service Advisor') || Auth::user()->pegawai->jabatan->nama_jabatan == 'Owner' || Auth::user()->role == 'admin_service_instructor') {
            return $next($request);
        }
        abort(403);
    }
}
