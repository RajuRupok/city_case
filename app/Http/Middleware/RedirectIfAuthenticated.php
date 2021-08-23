<?php

namespace App\Http\Middleware;

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
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check() && Auth::user()->role == 'city_corporation') {
                return redirect()->route('city_corporation.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == 'service_manager') {
                return redirect()->route('service_manager.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == 'support_staff') {
                return redirect()->route('support_staff.dashboard.index');
            } elseif (Auth::guard($guard)->check() && Auth::user()->role == 'citizen') {
                return redirect()->route('citizen.dashboard.index');
            }
        }
        
        return $next($request);
    }
}
