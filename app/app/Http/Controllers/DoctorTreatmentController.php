<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Role;
use App\Transaction;
use App\Treatment;
use App\TreatmentSelections;
use App\User;
use App\UserTreatments;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DoctorTreatmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('doctor');
    }
    //
    public function index($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        if($checkin->state == 0) {
            $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $treatments = Treatment::where('category', 0)->get();;
            $user_treatments = UserTreatments::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $nurses = Role::where('role_id', 3)->get();
            $category = 0;
            return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all', 'nurses', 'category'));
        } else {
            return redirect('404');
        }

    }
    public function gajig($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        if($checkin->state == 0) {
            $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $treatments = Treatment::where('category', 1)->get();
            $user_treatments = UserTreatments::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $nurses = Role::where('role_id', 3)->get();
            $category = 1;
            return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all', 'nurses', 'category'));
        } else {
            return redirect('404');
        }
    }
    public function sogog($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        if($checkin->state == 0) {
            $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $treatments = Treatment::where('category', 2)->get();
            $user_treatments = UserTreatments::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $nurses = Role::where('role_id', 3)->get();
            $category = 2;
            return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all', 'nurses', 'category'));
        } else {
            return redirect('404');
        }
    }
    public function mes($checkin_id) {
        $checkin = CheckIn::find($checkin_id);
        if($checkin->state == 0) {
            $checkin_all = CheckIn::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $treatments = Treatment::where('category', 3)->get();
            $user_treatments = UserTreatments::where('user_id', $checkin->user_id)->orderBy('id', 'DESC')->get();
            $nurses = Role::where('role_id', 3)->get();
            $category = 3;
            return view('doctor.treatment',compact('checkin', 'treatments','user_treatments', 'checkin_all', 'nurses', 'category'));
        } else {
            return redirect('404');
        }
    }
    public function store(Request $request) {
        $checkin = CheckIn::find($request['checkin_id']);
        if(empty($request['treatment_selection_id']) || $request['treatment_selection_id']==null || $request['treatment_selection_id']==0){
            if(empty($request['price'])) {
                $price = Treatment::find($request['treatment_id'])->price;
            } else {
                $price = $request['price'];
            }
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>0,'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id'], 'user_id'=>$checkin->user_id, 'price'=>$price]);
        } else {
            if(empty($request['price'])) {
                $price = TreatmentSelections::find($request['treatment_selection_id'])->price;
            } else {
                $price = $request['price'];
            }
            UserTreatments::create(['checkin_id'=>$request['checkin_id'],'treatment_id'=>$request['treatment_id'],'treatment_selection_id'=>$request['treatment_selection_id'],'tooth_id'=>$request['tooth_id'],'value'=>$request['value_id'], 'user_id'=>$checkin->user_id, 'price'=>$price]);
        }
        return back();
    }
    public function finish(Request $request) {
        $checkin = CheckIn::find($request['checkin_id']);
        $checkin->nurse_id = $request['nurse_id'];
        $checkin->state = 2;
        $checkin->save();
        return redirect('doctor');
    }
    public function delete_history($id) {
        UserTreatments::find($id)->delete();
        return redirect()->back();
    }
    public function xray(Request $request) {
        $user = User::find($request['xray_user_id']);
        if ($photo = $request->file(['photo'])) {
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('img/uploads', $photo_name);
            $user->photos()->create(['path'=>$photo_name]);
        }
        return redirect()->back();
    }

}
