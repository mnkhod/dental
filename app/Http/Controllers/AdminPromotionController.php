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
    public function index() {
        $promotions = Promotion::all()->sortByDesc('created_at');
        $last_promotion = $promotions->sortByDesc('id')->first();

        return view('admin.promotion',compact('promotions','last_promotion'));
    }
    public function store(Request $request){
        $end_date = strtotime($request['promotion_end_date']);
        $promotion_end_date = date('Y-m-d', $end_date);
        $promotion = Promotion::create(['promotion_code'=>$request['promotion_code'],'promotion_name'=>$request['promotion_name'],'percentage'=>$request['percentage'],'promotion_end_date'=>$promotion_end_date]);
        return redirect('/admin/promotion');
    }
    public function promotion_check($id){
        $promotions = Promotion::all()->sortByDesc('created_at');
        $prom = Promotion::find($id);
        $used = UserPromotions::all()->where('promotion_id',$prom->id);
        $sum = 0;
        foreach ($used as $use){
            $transaction = Transaction::find($use->transaction_id);
            $check_in = CheckIn::find($transaction->type_id);
            $user = User::find($check_in->user_id);
            $sum = $sum + (($transaction->price/(1-$prom->percentage/100))-$transaction->price);
        }
        return view('admin.promotion_check',compact('promotions','prom','used','transaction','check_in','user','sum'));
    }
}
