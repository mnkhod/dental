<?php

namespace App\Http\Controllers;

use App\Role;
use App\Time;
use Illuminate\Http\Request;

class AccountantShiftController extends Controller
{
    //
    public function index() {
        $doctors = Role::all()->where('role_id',2);
        $shifts = Time::all()->where('date', '>=', date('Y-m-d'));
        return view('accountant.shifts',compact('doctors', 'shifts'));
    }

    public function store($i, $doctor_staff_id, $shift_id){
        $date = date('Y-m-d', strtotime("+".$i." Days"));
        if (!is_null($time = Time::all()->where('date', $date)->where('doctor_id', $doctor_staff_id)->first())) {
            //Full time
            $time->shift_id = 2;
            $time->save();
        } else {
            //Half time
            Time::create(['doctor_id'=>$doctor_staff_id, 'date'=>$date,'shift_id'=>$shift_id]);
        }
        return redirect('/accountant/shifts');
    }

    public function cancel(Request $request){
        $id = $request['time_id'];
        Time::find($id)->delete();
        return redirect('/accountant/shifts');
    }
}
