<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Role;
use App\Transaction;
use App\Treatment;
use App\TreatmentSelections;
use App\User;
use App\UserTreatments;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorTreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }
    //
    public function index($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        if($checkin->state == 0) {
            $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $treatments = Treatment::all();
            $user_treatments = UserTreatments::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $nurses = Role::where('role_id', 3)->get();
            return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all', 'nurses'));
        } else {
            return redirect('404');
        }

    }
    public function store(Request $request) {
        $checkin = CheckIn::find($request['checkin_id']);
        if(empty($request['treatment_selection_id']) || $request['treatment_selection_id']==null || $request['treatment_selection_id']==0){
            $price = Treatment::find($request['treatment_id'])->price;
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>0,'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id'], 'user_id'=>$checkin->user_id, 'price'=>$price]);
        }
        else{
            $price = TreatmentSelections::find($request['treatment_selection_id'])->price;
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>$request['treatment_selection_id'],'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id'], 'user_id'=>$checkin->user_id, 'price'=>$price]);
        }
        return back();
    }
    public function finish(Request $request) {
        $checkin = CheckIn::find($request['checkin_id']);
        $checkin->nurse_id = $request['nurse_id'];
        $checkin->state = 2;
        $checkin->save();
        return redirect('doctor');
    }
    public function delete_history($id) {
        UserTreatments::find($id)->delete();
        return redirect()->back();
    }

}
