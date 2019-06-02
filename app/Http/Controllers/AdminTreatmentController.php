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
    public function edit($id) {
        $treatments = Treatment::all();
        $treatment = Treatment::find($id);
        return view('admin.treatment', compact('treatments', 'treatment'));
    }
    public function update(Request $request) {
        $treatment  = Treatment::find($request['treatment']);
    }
}
