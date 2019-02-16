<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    //
    public function index(){
        $doctor = Auth::user();
        return view('doctor.doctor_profile',compact('doctor'));
    }
}
