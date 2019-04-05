<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;

class AccountantStaffController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('accountant');
    }
    public function index() {
        $roles = Role::whereIn('role_id', [2,3,5]);
        return view('accountant.staffs', compact('roles'));
    }
    public function staff_check($id){
        $user = User::find($id);
        return view('accountant.staff_profile',compact('user'));
    }
}
