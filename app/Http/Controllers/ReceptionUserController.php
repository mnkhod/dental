<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReceptionUserController extends Controller
{
    //
    public function index() {
        return view('reception.users');
    }

    public function store(Request $request) {
        $pass = "dragon";
        $pass = bcrypt($pass);
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['description'],'password'=>$pass,'sex'=>$request['sex']]);
        return redirect('/reception/user');
    }
}
