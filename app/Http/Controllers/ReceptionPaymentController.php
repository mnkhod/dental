<?php

namespace App\Http\Controllers;

use App\CheckIn;
use App\Http\Middleware\Doctor;
use App\Item;
use App\ItemHistory;
use App\ProductHistory;
use App\Products;
use App\Promotion;
use App\Role;
use App\Transaction;
use App\TreatmentSelections;
use App\User;
use App\UserPromotions;
use App\UserTreatments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReceptionPaymentController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('reception');
    }
    public function index() {
        $treatment_done_users = CheckIn::all()->where('state',2);

        return view('reception.payment',compact('treatment_done_users'));

    }
    public function store(Request $request){
        $user_treatments = UserTreatments::all()->where('checkin_id',$request['checkin_id']);
        $total = 0;
        foreach ($user_treatments as $user_treatment){
            if($user_treatment->treatment_selection_id == 0){
                $total = $total + $user_treatment->treatment->price;
            }
            else{
                $total = $total + TreatmentSelections::find($user_treatment->treatment_selection_id)->price;
            }
        }
        if(empty($request['promotion_code'])){
            Transaction::create(['price'=>$total,'type'=>4,'type_id'=>$request['checkin_id'],'created_by'=>Auth::user()->id]);
            $update = CheckIn::find($request['checkin_id']);
            $update->update(['state' => 3]);
        }
        else {
            if($promotion = Promotion::where('promotion_end_date','>',date('Y-m-d'))->where('promotion_code',$request['promotion_code'])->first()){
                $total = $total - $total*$promotion->percentage/100;
                $transaction = Transaction::create(['price'=>$total,'type'=>4,'type_id'=>$request['checkin_id'],'created_by'=>Auth::user()->id]);
                UserPromotions::create(['transaction_id'=>$transaction->id,'promotion_id'=>$promotion->id, 'created_by'=>Auth::user()->id]);
                $update = CheckIn::find($request['checkin_id']);
                $update->update(['state' => 3]);
            }
        }
        return back();
    }
    public function lease(){
        return view('reception.lease');
    }
    public function product(){
        $products = Item::all();
        return view('reception.product',compact('products'));
    }
    public function show($id) {
        $products = Item::all();
        $specific_product = Item::find($id);
        $histories = ItemHistory::all()->where('item_id', $specific_product->id);
        $roles = Role::all();
        return view('reception.product_show', compact('products', 'specific_product', 'histories', 'roles','created_user'));
    }

    public function decrease_product(Request $request) {
        $product = Item::find($request['id']);
        $minus = $product->quantity - $request['quantity'];
        $product->update(['quantity'=>$minus]);
        ItemHistory::create(['item_id'=>$product->id,'quantity'=> -1 * $request['quantity'],'created_by'=>Auth::user()->id]);
        Transaction::create(['type'=>6,'type_id'=>$request['id'],'price'=> 1*$request['price'],'description'=>''.$product->name.' '.$product->quantity.' ширхэг зарсан.','created_by'=>Auth::user()->id]);
        return redirect('/reception/product/'.$product->id);
    }


}
