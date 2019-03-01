<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReceptionPaymentController extends Controller
{
    //
    public function index() {
        return view('reception.payment');
    }
}
