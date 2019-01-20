<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class AdminTimeController extends Controller
{
    //
    public function index() {
        $doctors = Role::all()->where('role_id',2);
        return view('admin.time',compact('doctors'));
    }
}
