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
}
