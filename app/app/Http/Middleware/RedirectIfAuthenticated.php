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
        if (Auth::guard($guard)->check()) {
            if (is_null(Auth::user()->role)){
                return redirect('/user');
            } else {
                if(Auth::user()->role->role_id == 0) {
                    return redirect('/admin/dashboard');
                } elseif (Auth::user()->role->role_id == 1) {
                    return redirect('/reception/time');
                } elseif (Auth::user()->role->role_id == 2) {
                    return redirect('/doctor/dashboard');
                }  elseif (Auth::user()->role->role_id == 4) {
                    return redirect('/accountant/transactions');
                } else {
                    return redirect('/user');
                }
            }
        }

        return $next($request);
    }
}
