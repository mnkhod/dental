<?php

namespace App\Http\Controllers;

use App\Treatment;
use Illuminate\Http\Request;

class AdminTreatmentController extends Controller
{
    //
    public function index() {
        $treatments = Treatment::all();
        return view('admin.treatments', compact('treatments'));
    }
}
