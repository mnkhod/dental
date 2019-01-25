<?php

namespace App\Http\Controllers;

use App\Role;
use App\Time;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminTimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    //
    public function index() {
        $doctors = Role::all()->where('role_id',2);
        $shifts = Time::all()->where('date', '>=', date('Y-m-d'));
        return view('admin.time',compact('doctors', 'shifts'));

    }
    public function store($i, $doctor_staff_id, $shift_id){
        $date = Carbon::now()->addDays($i);
        $time = Time::create(['doctor_id'=>$doctor_staff_id, 'date'=>$date,'shift_id'=>$shift_id]);
        return redirect('/admin/time');
    }
}
