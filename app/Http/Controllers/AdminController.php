<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\CheckIn;
use App\Log;
use App\ProductHistory;
use App\Products;
use App\Role;
use Aloha\Twilio\Support\Laravel\Facade as Twilio;
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
//        Twilio::message('+976'.$request['phone_number'],'MonFamily шүдний эмнэлгийн систем. Таны нэвтрэх нэр:'.$request['email'].'Таны нууц үг:'.$pass.'');
        $pass = 'dragon';
        $pass = bcrypt($pass);
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        $user = User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['description'],'password'=>$pass,'sex'=>$request['sex']]);
        $role = Role::create(['user_id'=>$user->id, 'role_id'=>$request['role'],'state'=>1]);
        if ($photo = $request->file(['photo'])) {
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('img/uploads', $photo_name);
            $user->photos()->create(['path'=>$photo_name]);
            return redirect('/admin/add_staff');
        }
        else{
            return redirect('/admin/add_staff');
        }
    }
    //---------------
    //PRODUCT SECTION
    //---------------
    public function profile($id){
        $user = User::find($id);
        return view('admin.staff_profile',compact('user'));
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

}
