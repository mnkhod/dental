<?php

namespace App\Http\Controllers;

use http\Client\Curl\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorTreatmentController extends Controller
{
    //
    public function index($user_id) {
        $user = \App\User::find($user_id);
        $age = Carbon::parse($user->birth_date)->age;
        return view('doctor.treatment',compact('user','age'));
    }

}
