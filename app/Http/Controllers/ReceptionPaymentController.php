<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Http\Middleware\Doctor;
use App\User;
use App\UserTreatments;
use Illuminate\Http\Request;

class ReceptionPaymentController extends Controller
{
    //
    public function index() {
        $treatment_done_users = CheckIn::all()->where('state',2);

        return view('reception.payment',compact('treatment_done_users'));

    }
    public function store(){
        return back();
    }
}
