<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('doctor');
    }
    public function index(){
        $doctor = Auth::user();
        $shifts = Time::all()->where('date', date('Y-m-d'))->where('doctor_id',$doctor->id)->first();
        if(empty($shifts)) {
            $checkins = null;
        } else {
            $checkins = $shifts->checkins->where('state', 0);
        }
        return view('doctor.check_in',compact('checkins'));
    }
}
