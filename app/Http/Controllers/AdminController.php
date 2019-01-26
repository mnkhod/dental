<?php

namespace App\Http\Controllers;

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
//    public function __construct()
//    {
//        $this->middleware('admin');
//    }

    //-------------
    //STAFF SECTION
    //-------------
    public function index(){
        $users = User::all();
        return view('admin.add_staff',compact('users'));
    }
    public function add_staff(Request $request){
        $pass = "dragon";
//        Twilio::message('+976'.$request['phone_number'],'MonFamily шүдний эмнэлгийн систем. Таны нэвтрэх нэр:'.$request['email'].'Таны нууц үг:'.$pass.'');
        $pass = bcrypt($pass);
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        $user = User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['description'],'password'=>$pass,'sex'=>$request['sex']]);
        $role = Role::create(['user_id'=>$user->id, 'role_id'=>$request['role']]);
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




    //--------------
    //DASHBOARD
    //--------------
    public function dashboard() {
        return view('admin.dashboard');
    }

}
