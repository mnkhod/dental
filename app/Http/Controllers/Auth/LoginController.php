<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
        if (!empty(Auth::user())) {
            if (Auth::user()->fitnessUser){
                return redirect('/home');
            } else {
                if($user = Auth::user()->fitnessUser->where('role_id', 1)->first()) {
                    session()->put(['fitness_id'=>$user->fitness_id]);
                    return redirect('/admin');
                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 2)->first()) {
                    session()->put(['reception_fitness_id'=>$user->fitness_id]);
                    return redirect('/reception');
                } elseif ($user = Auth::user()->fitnessUser->where('role_id', 3)->first()) {
                    session()->put(['trainer_fitness_id'=>$user->fitness_id]);
                    return redirect('/trainer');
                } else {
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
