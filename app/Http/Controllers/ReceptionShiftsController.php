<?php

namespace App\Http\Controllers;

use App\Log;
use App\Role;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionShiftsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('reception');
    }
    public function index() {
        $doctors = Role::all()->where('role_id',2);
        $shifts = Time::all()->where('date', '>=', date('Y-m-d'));
        return view('reception.shifts',compact('doctors', 'shifts'));
    }

    public function store($i, $doctor_staff_id, $shift_id){
        $date = date('Y-m-d', strtotime("+".$i." Days"));
        if (!is_null($time = Time::all()->where('date', $date)->where('doctor_id', $doctor_staff_id)->first())) {
            //Full time
            $time->shift_id = 2;
            $time->save();
        } else {
            //Half time
            Time::create(['doctor_id'=>$doctor_staff_id, 'date'=>$date,'shift_id'=>$shift_id,'created_by'=>Auth::user()->id]);
        }
        return redirect('/reception/shifts');
    }

    public function cancel(Request $request){
       $log = Log::create(['type'=>2,'type_id'=>$request['shift_id'],'user_id'=>Auth::user()->id,'action_id'=>0,'description'=>$request['description']]);
        $id = $request['shift_id'];
        //TODO(1) add validation to this (check if any user has an appointment)
        Time::find($id)->delete();
        return redirect('/reception/shifts');
    }
}
