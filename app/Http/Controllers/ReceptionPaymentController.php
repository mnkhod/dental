<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Http\Middleware\Doctor;
use App\Promotion;
use App\Transaction;
use App\TreatmentSelections;
use App\User;
use App\UserTreatments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionPaymentController extends Controller
{
    //
    public function index() {
        $treatment_done_users = CheckIn::all()->where('state',2);

        return view('reception.payment',compact('treatment_done_users'));

    }
    public function store(Request $request){
        $user_treatments = UserTreatments::all()->where('checkin_id',$request['checkin_id']);
        $total = 0;
        foreach ($user_treatments as $user_treatment){
            if($user_treatment->treatment_selection_id == 0){
                $total = $total + $user_treatment->treatment->price;
            }
            else{
                $total = $total + TreatmentSelections::find($user_treatment->treatment_selection_id)->price;
            }
        }
        if(empty($request['promotion_code'])){
            Transaction::create(['price'=>$total,'type'=>4,'type_id'=>$request['checkin_id'],'created_by'=>Auth::user()->id]);
            $update = CheckIn::find($request['checkin_id']);
            $update->update(['state' => 3]);
        }
        else {
            if($promotion = Promotion::where('promotion_end_date','>',date('Y-m-d'))->where('promotion_code',$request['promotion_code'])->first()){
                $total = $total - $total*$promotion->percentage/100;
                Transaction::create(['price'=>$total,'type'=>4,'type_id'=>$request['checkin_id'],'created_by'=>Auth::user()->id]);
                $update = CheckIn::find($request['checkin_id']);
                $update->update(['state' => 3]);
            }
        }
        return back();
    }
}
