<?php

namespace App\Http\Controllers;

use App\ProductHistory;
use App\Products;
use App\Role;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantProductController extends Controller
{
    //
    public function product(){
        $products = Products::all();
        return view('accountant.product',compact('products'));
    }
    public function show($id) {
        $products = Products::all();
        $specific_product = Products::find($id);
        $histories = ProductHistory::all()->where('product_id', $specific_product->id);
        $roles = Role::all();
        return view('accountant.product_show', compact('products', 'specific_product', 'histories', 'roles'));
    }
    public function add_product(Request $request){
        $product = Products::create(['name'=>$request['name'],'quantity'=>0]);
        return redirect('/accountant/products');
    }
    public function edit_product(Request $request){
        $product = Products::find($request['id']);
        $product->update(['quantity'=>$product->quantity + $request['quantity']]);
        ProductHistory::create(['product_id'=>$product->id, 'user_id'=>Auth::user()->id, 'quantity'=>$request['quantity'], 'description'=>Auth::user()->name . ' нэмэв', 'created_by'=>Auth::user()->id]);
        Transaction::create(['type'=>2,'type_id'=>$request['id'],'price'=> -1*$request['price'],'description'=>''.$product->name.' '.$product->quantity.' ширхэг', 'created_by'=>Auth::user()->id]);
        return redirect('/accountant/products/'.$product->id);
    }

    public function decrease_product(Request $request) {
        $product = Products::find($request['id']);
        $user = User::find($request['user_id']);
        ProductHistory::create(['product_id'=>$product->id, 'user_id'=>$user->id, 'quantity'=> -1 * $request['quantity'], 'description'=>$user->name . ' '.$request['quantity'].' ширхэгийг авав', 'created_by'=>Auth::user()->id]);
        $product->update(['quantity'=>$product->quantity - $request['quantity']]);
        return redirect('/accountant/products/'.$product->id);
    }

    public function delete_product($id){
        $product = Products::find($id);
        $product->delete();
        return redirect('/accountant/products');
    }
}
