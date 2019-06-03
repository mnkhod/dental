<?php

namespace App\Http\Controllers;

use App\Treatment;
use App\TreatmentSelections;
use Illuminate\Http\Request;

class AdminTreatmentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index() {
        $treatments = Treatment::all();
        return view('admin.treatments', compact('treatments'));
    }
    public function edit($id) {
        $treatments = Treatment::all();
        $treatment = Treatment::find($id);
        return view('admin.treatment', compact('treatments', 'treatment'));
    }
    public function editTreatmentSelection($id, $s_id) {
        $treatments = Treatment::all();
        $treatment = Treatment::find($id);
        $treatmentSelection = TreatmentSelections::find($s_id);
        return view('admin.treatment', compact('treatments', 'treatment', 'treatmentSelection'));
    }
    public function update(Request $request) {
        $treatment  = Treatment::find($request['treatment_id']);
        $treatment->name = $request['name'];
        $treatment->selection_type = $request['selection_type'];
        $treatment->category = $request['category'];
        $treatment->price = $request['price'];
        $treatment->limit = $request['limit'];
        $treatment->save();
        return redirect()->back();
    }
    public function updateTreatmentSelection(Request $request) {
        $treatmentSelection  = TreatmentSelections::find($request['treatment_selection_id']);
        $treatmentSelection->name = $request['s_u_name'];
        $treatmentSelection->price = $request['s_u_price'];
        $treatmentSelection->limit = $request['s_u_limit'];
        $treatmentSelection->save();
        return redirect()->back();
    }
    public function store(Request $request) {
       Treatment::create(['name'=>$request['name'], 'selection_type'=>$request['selection_type'],
           'category'=>$request['category'], 'price'=>$request['price'], 'limit'=>$request['limit']]);
        return redirect()->back();
    }
    public function storeTreatmentSelection(Request $request) {
        TreatmentSelections::create(['treatment_id'=>$request['s_treatment_id'],'name'=>$request['s_name'],
            'price'=>$request['s_price'], 'limit'=>$request['s_limit']]);
        return redirect()->back();
    }
}
