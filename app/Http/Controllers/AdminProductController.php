<?php

namespace App\Http\Controllers;

use App\ProductHistory;
use App\Products;
use App\Role;
use Aloha\Twilio\Support\Laravel\Facade as Twilio;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    //
    public function product(){
        $products = Products::all();
        return view('admin.product',compact('products'));
    }
    public function show($id) {
        $products = Products::all();
        $specific_product = Products::find($id);
        $histories = ProductHistory::all()->where('product_id', $specific_product->id);
        $roles = Role::all();

        return view('admin.product_show', compact('products', 'specific_product', 'histories', 'roles','created_user'));
    }
    public function add_product(Request $request){
        $product = Products::create(['name'=>$request['name'],'quantity'=>0]);
        return redirect('/admin/product');
    }
    public function edit_product(Request $request){
        $product = Products::find($request['id']);
        $product->update(['quantity'=>$product->quantity + $request['quantity']]);
        ProductHistory::create(['product_id'=>$product->id, 'user_id'=>Auth::user()->id, 'quantity'=>$request['quantity'], 'description'=>Auth::user()->name . ' нэмэв', 'created_by'=>Auth::user()->id]);
        Transaction::create(['type'=>2,'type_id'=>$request['id'],'price'=> -1*$request['price'],'description'=>''.$product->name.' '.$product->quantity.' ширхэг','created_by'=>Auth::user()->id]);
        return redirect('/admin/product/'.$product->id);
    }

    public function decrease_product(Request $request) {
        $product = Products::find($request['id']);
        $user = User::find($request['user_id']);
        ProductHistory::create(['product_id'=>$product->id, 'user_id'=>$user->id, 'quantity'=> -1 * $request['quantity'], 'description'=>$user->name . ' '.$request['quantity'].' ширхэгийг авав','created_by'=>Auth::user()->id]);
        $product->update(['quantity'=>$product->quantity - $request['quantity']]);
        return redirect('/admin/product/'.$product->id);
    }

    public function delete_product($id){
        $product = Products::find($id);
        $product->delete();
        return redirect('/admin/product');
    }
}
