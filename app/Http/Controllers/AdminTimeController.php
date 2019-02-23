<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\Role;
use App\Time;
use App\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminTimeController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('admin');
//    }
//    //
    public function index() {
        $doctors = Role::all()->where('role_id',2);
        $shifts = Time::all()->where('date', '>=', date('Y-m-d'));
        return view('admin.time',compact('doctors', 'shifts'));

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
        return redirect('admin/time');
    }

    public function cancel(Request $request){
        $id = $request['time_id'];
        Time::find($id)->delete();
        return redirect('/admin/time');
    }

    public function time() {
        $shifts = Time::all()->where('date', date('Y-m-d'));
        return view('admin.day', compact('shifts'));
    }

    public function timeWeek($id) {
        $role = Role::find($id);
        $roles = Role::where('role_id', 2);
        $shifts = $role->shifts->where('date', '>=', date('Y-m-d'));
        return view('admin.week', compact('role', 'roles', 'shifts'));
    }
    public function storeAppointment(Request $request) {

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

        if($user =User::where('phone_number',$request['phone'])->first()){
            Appointment::create(['shift_id'=>$request['shift_id'], 'name'=>$user->name,'phone'=>$request['phone'],'start'=>$request['time'], 'end'=>$request['time']+$request['hours']]);
        }
        else{
            Appointment::create(['shift_id'=>$request['shift_id'],'name'=>$request['name'], 'phone'=>$request['phone'], 'start'=>$request['time'], 'end'=>$request['time']+$request['hours']]);
        }
        return back();
    }
    public function cancelAppointment(Request $request){
        if($request['code'] == '12345678'){
            $id = $request['appointment_id'];
            Appointment::find($id)->delete();
            return back();
        }
        else{
            return back();
        }
    }

}
