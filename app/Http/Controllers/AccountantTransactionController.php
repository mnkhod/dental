<?php

namespace App\Http\Controllers;

use App\Role;
use App\Transaction;
use Illuminate\Http\Request;

class AccountantTransactionController extends Controller
{
    //

//    public function __construct()
//    {
//        $this->middleware('accountant');
//    }


    public function index() {
        $transactions = Transaction::all()->where('created_at','>', date('Y-m-d', strtotime('-30 Days')))->sortByDesc('id');
        $roles = Role::all();
        $start_date = strtotime('-30 Days');
        $end_date = strtotime('Today');;
        return view('accountant.transaction', compact('transactions', 'roles', 'start_date', 'end_date'));
    }



    public function search($start_date, $end_date) {
        $transactions = Transaction::all()->whereBetween('created_at', [date('Y-m-d', $start_date), date('Y-m-d', $end_date)])->sortByDesc('id');
        $roles = Role::all();
        return view('accountant.transaction', compact('transactions', 'roles', 'start_date', 'end_date'));
    }



    public function store(Request $request) {
        Transaction::create(['price'=> -1*$request['price'], 'type'=>3, 'type_id'=>0, 'description'=>$request['description']]);
        return redirect('/accountant/transactions');
    }
    public function salary(Request $request) {
        $user = User::find($request['staff']);
        Transaction::create(['price'=> -1*$request['price'], 'type'=>1, 'type_id'=>$request['staff'], 'description'=>$user->name.' цалин']);
        return redirect('/accountant/transactions');
    }
    public function income(Request $request) {
        Transaction::create(['price'=> $request['price'], 'type'=>5, 'type_id'=>0, 'description'=>$request['description']]);
        return redirect('/accountant/transactions');
    }

    public function date(Request $request) {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $start_date = explode('/', $start_date);
        $start_date = strtotime($start_date[2] . '-' . $start_date[0] . '-' . $start_date[1]);
        $end_date = explode('/', $end_date);
        $end_date = strtotime($end_date[2] . '-' . $end_date[0] . '-' . $end_date[1]);;
        return redirect('/accountant/transactions/' . $start_date.'/'.$end_date);
    }
}
