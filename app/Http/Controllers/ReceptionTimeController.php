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
        return view('reception.time', compact('shifts'));
    }
    public function store(Request $request) {
        Appointment::create(['shift_id'=>$request['shift_id'],'name'=>$request['name'], 'phone'=>$request['phone'], 'start'=>$request['time'], 'end'=>$request['time']+$request['hours']]);
        return redirect('/reception/time');
    }
}
