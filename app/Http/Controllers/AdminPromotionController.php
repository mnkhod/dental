<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminPromotionController extends Controller
{
    //
    public function index() {
        return view('admin.promotion');
    }
}
