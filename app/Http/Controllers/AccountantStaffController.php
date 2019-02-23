<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AccountantStaffController extends Controller
{
    //
    public function index() {
        $roles = Role::whereIn('role_id', [2,3,5]);
        return view('accountant.staffs', compact('roles'));
    }
}
