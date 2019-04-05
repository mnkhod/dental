<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountantHospitalController extends Controller
{
    //
    public function index() {
        return view('accountant.hospital');
    }
}
