<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated()
    {
        if (Auth::check()) {
            if (is_null(Auth::user()->role)){
                return redirect('/home');
            } else {
                if(Auth::user()->role->role_id == 0) {
                    return redirect('/admin');
                } elseif (Auth::user()->role->role_id == 1) {
                    return redirect('/reception');
                } elseif (Auth::user()->role->role_id == 2) {
                    return redirect('/doctor');
                } elseif (Auth::user()->role->role_id == 1) {
                    return redirect('/reception');
                }  else {
                    return redirect('/home');
                }
            }
        } else {
            return redirect(route('login'));
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
