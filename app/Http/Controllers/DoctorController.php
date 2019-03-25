<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    public function index(){
        $doctor = Auth::user();
        $shifts = Time::all()->where('date', date('Y-m-d'))->where('doctor_id',Auth::user()->id)->first();
        $checkins = $shifts->checkins;
        return view('doctor.check_in',compact('checkins'));
    }
}
