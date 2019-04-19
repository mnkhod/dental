<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\UserTreatments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index() {
            $checkin_all = CheckIn::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
            $user_treatments = UserTreatments::where('user_id',  Auth::user()->id)->orderBy('id', 'DESC')->get();
            return view('user.user_profile',compact( 'treatments','user_treatments', 'checkin_all'));
    }
}
