<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\CheckIn;
use App\Lease;
use App\Log;
use App\ProductHistory;
use App\Products;
use App\Role;
use Aloha\Twilio\Support\Laravel\Facade as Twilio;
use App\Time;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //-------------
    //STAFF SECTION
    //-------------
    public function index(){
        $roles = Role::all();
        return view('admin.add_staff',compact('roles'));
    }
    public function add_staff(Request $request){
//        $pass = str_random('6');
//        Twilio::message('+976'.$request['phone_number'],'MonFamily шүдний эмнэлгийн систем. Таны нэвтрэх нэр:'.$request['email'].' '.'Таны нууц үг:'.$pass.'');
        $pass = $request['password'];
        $pass = bcrypt($pass);
        $validatedData = $request->validate([
            'last_name' => 'required|max:255',
            'email'=>'required|unique:users|max:255',
            'name'=>'required|max:255',
            'sex'=>'required',
            'register'=>'required|unique:users|max:255',
        ]);
        $date = explode('/', $request['birth_date']);
        $birth_date = $date[2] . '-' . $date[0] . '-' . $date[1];
        $user = User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['info'],'password'=>$pass,'sex'=>$request['sex']]);
        $role = Role::create(['user_id'=>$user->id, 'role_id'=>$request['role'],'state'=>1]);
        return redirect('/admin/add_staff');
    }
    //---------------
    //PRODUCT SECTION
    //---------------
    public function profile($id){
        $user = User::find($id);
        if($user->role->role_id == 2) {
            $shifts = Time::where('doctor_id', $user->id)->where('date','>=', date('Y-m-d', strtotime('first day of this month')))->orderBy('id', 'desc')->get();
            return view('admin.staff_profile',compact('user', 'shifts'));
        } else if($user->role->role_id == 3) {
            $checkins = CheckIn::where('nurse_id', $user->id)->where('created_at','>=', date('Y-m-d', strtotime('first day of this month')))->orderBy('id', 'desc')->get();
            return view('admin.staff_profile', compact('user', 'checkins'));
        }
        return view('admin.staff_profile', compact('user'));
    }
    public function fire($id){
        $user=User::find($id);
        $user->role->update(['state'=>0]);
        return redirect('/admin/add_staff/'.$id.'/profile');
    }
    //--------------
    //DASHBOARD
    //--------------
    public function dashboard() {
        $users = User::all()->count();
        $roles =Role::all()->count();
        $users_number = $users - $roles;
        $appointments = Appointment::all()->where('created_at','>',date('Y-m-d 00:00:00'))->count();
        $checkins = CheckIn::where('created_at','>',date('Y-m-d'))->count();
        return view('admin.dashboard',compact('users_number','roles','appointments','checkins'));
    }
    public function logs(){
        $logs=Log::all();
        return view('admin.logs',compact('logs'));
    }
    public function users(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function user_check($id){
        $user = User::find($id);
        $check_ins = CheckIn::all()->where('state','>=',3)->where('user_id',$id);

        return view('admin.user_check',compact('user','check_ins'));

    }

    public function hospital(){

        return view('admin.hospital');
    }

    public function search(Request $request){
        $input = $request->key;
        $results = User::where('email', 'like', '%'.$input.'%')
            ->orWhere('phone_number', 'like', '%'.$input.'%')
            ->orWhere('name', 'like', '%'.$input.'%')
            ->orWhere('last_name', 'like', '%'.$input.'%')
            ->limit('25');

        return view('admin.search', compact('results', 'input'));
    }


}
