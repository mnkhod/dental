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
            if (Auth::user()->role->isEmpty()){
                return redirect('/home');
            } else {
                if(Auth::user()->role->role_id == 0) {
                    return redirect('/admin');
                } elseif (Auth::user()->role->role_id == 1) {
                    return redirect('/reception');
                } elseif (Auth::user()->role->role_id == 2) {
                    return redirect('/doctor');
                } else {
                    return redirect('/home');
                }
            }
        }

        return $next($request);
    }
}
