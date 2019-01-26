<?php

namespace App\Http\Controllers;

use App\Role;
use App\Time;
use Illuminate\Http\Request;

class ReceptionTimeController extends Controller
{
    //
    public function index() {
        $shifts = Time::all()->where('date', date('Y-m-d'));
        return view('reception.time', compact('shifts'));
    }
}
