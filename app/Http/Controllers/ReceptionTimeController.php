<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Role;
use App\Time;
use Illuminate\Http\Request;

class ReceptionTimeController extends Controller
{
    //
    public function index() {
        $shifts = Time::all()->where('date', date('Y-m-d'));
        return view('reception.dashboard', compact('shifts'));
    }

    public function time() {
        $shifts = Time::all()->where('date', date('Y-m-d'));
        return view('reception.time', compact('shifts'));
    }
    public function timeWeek($id) {
        $role = Role::find($id);
        $roles = Role::where('role_id', 2);
        $shifts = $role->shifts->where('date', '>=', date('Y-m-d'));
        return view('reception.time_week', compact('role', 'roles', 'shifts'));

    }

//    public function date(Request $request) {
//        $shifts = Time::all()->where('date', date('Y-m-d'));
//        return view('reception.time', compact('shifts'));
//    }


    public function store(Request $request) {

        $shift = Time::find($request['shift_id']);
        if ($shift->shift_id == 0) {
            $times = [15, 16, 17, 18, 19, 20];
        } elseif ($shift->shift_id == 1) {
            $times = [9, 10, 11, 12, 13, 24];
        } else {
            $times = [];
        }

        //Generating database's array

        $appointments = $shift->appointments->sortBy('start');
        foreach ($appointments as $appointment) {
            $start = $appointment->start;
            $end = $appointment->end;
            for ($i = $start; $i<$end; $i++) {
                array_push($times, $i);
            }
        }

        //Generating input's array
        $time = [];
        $start = $request['time'];
        $end = $request['time']+$request['hours'];
        for ($i = $start; $i<$end; $i++) {
            array_push($time, $i);
        }

        //Checking appointment
        for ($i = 0; $i<count($time); $i++) {
            for ($c = 0; $c<count($times); $c++) {
                if ($times[$c] == $time[$i]) {
                    //Return validation message
                    return 'shit';
                }
            }
        }

        Appointment::create(['shift_id'=>$request['shift_id'],'name'=>$request['name'], 'phone'=>$request['phone'], 'start'=>$request['time'], 'end'=>$request['time']+$request['hours']]);
        return redirect('/reception/time');
    }
    public function appointment_index(){
        $doctors = Role::all()->where('role_id',2);
        $shifts = Time::all()->where('doctor_id', 3);
        $shift1 = $shifts->where('date', date('Y-m-d', strtotime('+' . 1 . ' Days')));
        $shift = $shifts->where('date', date('Y-m-d', strtotime('+' . 0 . ' Days')));
        $shift2 = $shifts->where('date', date('Y-m-d', strtotime('+' . 2 . ' Days')));
        $shift3 = $shifts->where('date', date('Y-m-d', strtotime('+' . 3 . ' Days')));
        $shift4 = $shifts->where('date', date('Y-m-d', strtotime('+' . 4 . ' Days')));
        $shift5 = $shifts->where('date', date('Y-m-d', strtotime('+' . 5 . ' Days')));
        $shift6 = $shifts->where('date', date('Y-m-d', strtotime('+' . 6 . ' Days')));
        return view('reception.appointment',compact('doctors','shift','shift1','shift2','shift3','shift4','shift5','shift6'));
    }
    public function appointment_edit(){
        return redirect('/reception/appointment');
    }
    public function appointment_cancel(){
        return redirect('/reception/appointment');
    }
    public function cancel(Request $request){
        $id = $request['appointment_id'];
        Appointment::find($id)->delete();
        return redirect('/reception/time');
    }
}
