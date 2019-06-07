<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\CheckIn;
use App\Role;
use App\Time;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionUserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('reception');
    }
    public function index() {
        $users = User::all()->sortByDesc('created_at');
        return view('reception.users', compact('users'));
    }

    public function fromAppointment($name, $phone, $appointment_id) {
        $param = array($name, $phone, $appointment_id);
        $users = User::all()->sortByDesc('created_at');
        return view('reception.users', compact('param', 'users'));
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'last_name' => 'required|max:255',
//            'email'=>'max:255',
            'name'=>'required|max:255',
            'sex'=>'required',
            'register'=>'required|unique:users|max:255',

            ]);
        $pass = "dragon";
        $pass = bcrypt($pass);
        if(empty($request['email']))
            $request['email'] = 'nomail@gmail.com';
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        $user = User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['info'],'password'=>$pass,'sex'=>$request['sex']]);
        if($request['appointment_id']) {
            $appointment = Appointment::find(intval($request['appointment_id']));
            $appointment->user_id = $user->id;
            $appointment->save();
            $shift_id = $appointment->shift_id;
            CheckIn::create(['shift_id'=>$shift_id, 'user_id'=>$user->id, 'state'=>0, 'created_by'=>Auth::user()->id,'nurse_id'=>0]);
        }
        return redirect('/reception/user');
    }
    public function update(Request $request) {
        $user = User::find($request['user_id']);
        $user->name = $request['name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->phone_number = $request['phone_number'];
        $user->register = $request['register'];
        $user->sex = $request['sex'];
        $user->birth_date = date('Y-m-d', strtotime($request['birth_date']));
        $user->location = $request['location'];
        $user->description = $request['info'];
        $user->save();
        return redirect()->back();
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
        $check_ins = CheckIn::all()->where('state','>=',3)->where('user_id',$id);
        return view('reception.user_check',compact('user','check_ins'));
    }
    public function user_update($id){
        $user = User::find($id);
        $check_ins = CheckIn::all()->where('state','>=',3)->where('user_id',$id);
        return view('reception.user_update',compact('user','check_ins'));
    }
    public function user_check_edit($id){
        return redirect('/reception/user_check/'.$id);
    }
    public function check_in($id,$appointment_id){
        $app = Appointment::find($appointment_id);
        $shift = $app->shift_id;
        $doctor = Time::find($shift)->doctor_id;
        CheckIn::create(['user_id'=>$id,'doctor_id'=>$doctor, ]);
        return back();
    }

}
