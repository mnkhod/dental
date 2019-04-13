<?php

namespace App\Http\Controllers;

use App\Item;
use App\ItemHistory;
use App\Role;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantItemController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('accountant');
    }
    public function item(){
        $products = Item::all();
        return view('accountant.item',compact('products'));
    }
    public function show($id) {
        $products = Item::all();
        $specific_product = Item::find($id);
        $histories = ItemHistory::all()->where('item_id', $specific_product->id);
        return view('accountant.item_show', compact('products', 'specific_product', 'histories', 'roles'));
    }
    public function add_item(Request $request){
        $product = Item::create(['name'=>$request['name'],'price'=>$request['price'],'quantity'=>0]);
        return redirect('/accountant/items');
    }
    public function edit_item(Request $request){
        $product = Item::find($request['id']);
        $product->update(['quantity'=>$product->quantity + $request['quantity']]);
        ItemHistory::create(['item_id'=>$product->id,'quantity'=>$request['quantity'], 'created_by'=>Auth::user()->id]);
        Transaction::create(['type'=>7,'type_id'=>$request['id'],'price'=> -1*$request['price'],'description'=>''.$product->name.' '.$product->quantity.' ширхэг', 'created_by'=>Auth::user()->id]);
        return redirect('/accountant/items/'.$product->id);
    }
    public function delete_item($id){
        $product = Item::find($id);
        $product->delete();
        return redirect('/accountant/items');

    }
}
