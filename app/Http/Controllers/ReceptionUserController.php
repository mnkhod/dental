<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\CheckIn;
use App\Time;
use App\User;
use Illuminate\Http\Request;

class ReceptionUserController extends Controller
{
    //
    public function index() {
        $users = User::all()->sortBy('created_at');
        return view('reception.users', compact('users'));
    }

    public function store(Request $request) {
        $pass = "dragon";
        $pass = bcrypt($pass);
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['description'],'password'=>$pass,'sex'=>$request['sex']]);
        return redirect('/reception/user');
    }

    public function search(Request $request){
        $input = $request->key;
        $results = User::where('email', 'like', '%'.$input.'%')
            ->orWhere('phone_number', 'like', '%'.$input.'%')
            ->orWhere('name', 'like', '%'.$input.'%')
            ->orWhere('last_name', 'like', '%'.$input.'%')
            ->limit('25');

        return view('reception.search', compact('results', 'input'));
    }
    public function user_check($id){
        $user = User::find($id);
        return view('reception.user_check',compact('user'));
    }
    public function user_check_edit($id){
        return redirect('/reception/user_check/'.$id);
    }
    public function check_in($id,$appointment_id){
        $app = Appointment::find($appointment_id);
        $shift = $app->shift_id;
        $doctor = Time::find($shift)->doctor_id;
        CheckIn::create(['user_id'=>$id,'doctor_id'=>$doctor]);
        return back();
    }

}
