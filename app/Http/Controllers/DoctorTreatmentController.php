<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Treatment;
use App\User;
use App\UserTreatments;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorTreatmentController extends Controller
{
    //
    public function index($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        $treatments = Treatment::all();
        $user_treatments = UserTreatments::all()->where('checkin_id',$checkin_id);

        return view('doctor.treatment',compact('checkin', 'treatments','user_treatments'));
    }
    public function store(Request $request){
        UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>$request['treatment_selection_id'],'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id']]);
        return back();
    }

}
