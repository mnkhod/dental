<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Treatment;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorTreatmentController extends Controller
{
    //
    public function index($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        $treatments = Treatment::all();
        return view('doctor.treatment',compact('checkin', 'treatments'));
    }
    public function store(Request $request){
        Treatment::create();
        return back();
    }

}
