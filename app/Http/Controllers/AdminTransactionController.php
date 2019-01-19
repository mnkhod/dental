<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class AdminTransactionController extends Controller
{
    //
    public function index() {
        $transactions = Transaction::all()->sortByDesc('id');
        $roles = Role::all();
        return view('admin.transaction', compact('transactions', 'roles'));
    }
    public function store(Request $request) {
        Transaction::create(['price'=> -1*$request['price'], 'type'=>3, 'type_id'=>0, 'description'=>$request['description']]);
        return redirect('/admin/transaction');
    }
    public function salary(Request $request) {
        $user = User::find($request['staff']);
        Transaction::create(['price'=> -1*$request['price'], 'type'=>1, 'type_id'=>$request['staff'], 'description'=>$user->name.' цалин']);
        return redirect('/admin/transaction');
    }
}
