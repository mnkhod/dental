<?php

namespace App\Http\Controllers;

use App\Promotion;
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
        return view('admin.promotion_check',compact('promotions','prom'));
    }
}
