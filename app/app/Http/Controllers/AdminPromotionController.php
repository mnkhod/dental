<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Promotion;
use App\Transaction;
use App\User;
use App\UserPromotions;
use Illuminate\Http\Request;

class AdminPromotionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index() {
        $promotions = Promotion::all()->sortByDesc('created_at');
        $last_promotion = $promotions->sortByDesc('id')->first();

        return view('admin.promotion',compact('promotions','last_promotion'));
    }
    public function store(Request $request){
        $date = explode('/', $request['promotion_end_date']);
        $date = $date[2] . '-' . $date[0] . '-' . $date[1];
        $promotion_end_date = $date;
        Promotion::create(['promotion_code'=>$request['promotion_code'],'promotion_name'=>$request['promotion_name'],'percentage'=>$request['percentage'],'promotion_end_date'=>$promotion_end_date]);
        return redirect('/admin/promotion');
    }
    public function promotion_check($id){
        $promotions = Promotion::all()->sortByDesc('created_at');
        $prom = Promotion::find($id);
        $used = UserPromotions::all()->where('promotion_id',$prom->id);
        $sum = 0;
        foreach ($prom->user_promotions as $use){
            $check_in = $use->checkin;
            $user = $check_in->user_id;
//            $sum = $sum + (($transaction->price/(1-$prom->percentage/100))-$transaction->price);
        }
        return view('admin.promotion_check',compact('promotions','prom','used','check_in','user','sum'));
    }
    public function promotion_edit_index($id){
        $prom = Promotion::find($id);
        return view('admin.promotion_edit',compact('prom'));
    }
    public function promotion_edit($id, Request $request){
        $prom  = Promotion::find($id);
        $prom->percentage = $request['percentage'];
        $prom->promotion_code = $request['promotion_code'];
        $prom->promotion_name = $request['promotion_name'];
        $date = explode('/', $request['promotion_end_date']);
        $date = $date[2] . '-' . $date[0] . '-' . $date[1];
        $prom->promotion_end_date = $date;
        $prom->save();
        return redirect('/admin/promotion');
    }
}
