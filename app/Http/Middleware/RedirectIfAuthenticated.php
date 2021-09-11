<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::SSO);
        }
        // $get_session = $request->session()->get('login_web_59ba36addc2b2f9401580f014c7f58ea4e30989d');
        // if ($request->session()->has($get_session)) {
        //     //return route('dashboardsso');
        //     return redirect(RouteServiceProvider::SSO);
        // } else {
        //     return $next($request);
        // }
        return $next($request);
    }
}
