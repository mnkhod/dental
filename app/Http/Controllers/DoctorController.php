<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Time;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('doctor');
    }
    public function index(){
        $doctor = Auth::user();
        $shifts = Time::all()->where('date', date('Y-m-d'))->where('doctor_id',$doctor->id)->first();
        if(empty($shifts)) {
            $checkins = null;
        } else {
            $checkins = $shifts->checkins->where('state', 0);
        }
        return view('doctor.check_in',compact('checkins'));
    }
    public function dashboard() {
        $user = Auth::user();
        $shifts = Time::where('doctor_id', $user->id)->where('date','>=', date('Y-m-d', strtotime('first day of this month')))->orderBy('id', 'desc')->get();
        return view('doctor.dashboard',compact('user', 'shifts'));
    }
    public function search($start_date, $end_date) {
        $user = Auth::user();
        $shifts = Time::all()->whereBetween('created_at', [date('Y-m-d', $start_date), date('Y-m-d', $end_date)])->sortByDesc('id');
        return view('doctor.dashboard', compact('user', 'shifts','start_date', 'end_date'));
    }
    public function by_month(Request $request){
        $month = $request['month'];
        $year = $request['year'];
        $end_month = $request['month']+1;
        $start_date= strtotime($year .'-'.$month.'-'.'1');
        if($end_month == 12){
            $end_month = 1;
        }
        $end_date = strtotime($year.'-'.$end_month.'-'.'1');
        return redirect('/doctor/dashboard/' . $start_date.'/'.$end_date);
    }
    public function date(Request $request) {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $start_date = explode('/', $start_date);
        $start_date = strtotime($start_date[2] . '-' . $start_date[0] . '-' . $start_date[1]);
        $end_date = explode('/', $end_date);
        $end_date = strtotime($end_date[2] . '-' . $end_date[0] . '-' . $end_date[1]);;
        return redirect('/doctor/dashboard/' . $start_date.'/'.$end_date);
    }

}
