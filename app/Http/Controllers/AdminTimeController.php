<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminTimeController extends Controller
{
    //
    public function index() {
        return view('admin.time');
    }
}
