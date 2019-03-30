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
        $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
        $treatments = Treatment::all();
        $user_treatments = UserTreatments::where('checkin_id',$checkin_id)->orderBy('id', 'DESC')->get();

        return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all'));
    }
    public function store(Request $request){
        if(empty($request['treatment_selection_id']) || $request['treatment_selection_id']==null || $request['treatment_selection_id']==0){
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>0,'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id']]);
        }
        else{
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>$request['treatment_selection_id'],'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id']]);
        }
        return back();
    }

}
