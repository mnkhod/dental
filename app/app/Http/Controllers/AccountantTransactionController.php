<?php

namespace App\Http\Controllers;

use App\Log;
use App\OutcomeCategory;
use App\Role;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountantTransactionController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('accountant');
    }


    public function index() {
        $transactions = Transaction::all()->where('created_at','>=', date('Y-m-d', strtotime('first day of this month')))->sortByDesc('id');
        $roles = Role::all();
        $types = OutcomeCategory::all();
        $start_date = strtotime('-30 Days');
        $end_date = strtotime('Today');
        return view('accountant.transaction', compact('transactions', 'roles', 'start_date', 'end_date', 'types'));
    }

    public function edit(Request $request) {
        $transaction = Transaction::find($request['transaction_id']);
        Log::create(['type'=>0,'type_id'=>$transaction->id,'user_id'=>Auth::user()->id,'action_id'=>1,'description'=> 'Хэмжээ '
            .$transaction->price.'₮ -> '.$request['price'].'₮ Тайлбар '.$transaction->description. ' -> '. $request['description'] . ' Төрөл: '
            .OutcomeCategory::find($transaction->type)->name. ' -> '.OutcomeCategory::find($request['transaction_edit_type'])->name]);
        $transaction->update(['price'=>$request['price'],'description'=>$request['description'],'type'=>$request['transaction_edit_type']]);
        return redirect('/accountant/transactions');
    }
//    public function delete(Request $request){
//        $trans = Transaction::find($request['transaction_id']);
//        $log = Log::create(['type'=>0,'type_id'=>$request['transaction_id'],'user_id'=>Auth::user()->id,'action_id'=>0,'description'=>$request['description']]);
//        $trans->delete();
//        return redirect('/accountant/transactions');
//
//    }

    public function search($start_date, $end_date) {
        $transactions = Transaction::all()->whereBetween('created_at', [date('Y-m-d', $start_date), date('Y-m-d', $end_date)])->sortByDesc('id');
        $roles = Role::all();
        $types = OutcomeCategory::all();
        return view('accountant.transaction', compact('transactions', 'roles', 'start_date', 'end_date', 'types'));
    }

    public function updateOutcomeType(Request $request) {

    }

    public function store(Request $request) {
        Transaction::create(['price'=> -1*$request['price'], 'type'=>$request['type'], 'type_id'=>0, 'description'=>$request['description'],'created_by'=>Auth::user()->id]);
        return redirect('/accountant/transactions');
    }
    public function salary(Request $request) {
        $user = Role::find($request['staff'])->staff;
        Transaction::create(['price'=> -1*$request['price'], 'type'=>1, 'type_id'=>$request['staff'], 'description'=>$user->name.' цалин','created_by'=>Auth::user()->id]);
        return redirect('/accountant/transactions');
    }
    public function income(Request $request) {
        Transaction::create(['price'=> $request['price'], 'type'=>5, 'type_id'=>0, 'description'=>$request['description'],'created_by'=>Auth::user()->id]);
        return redirect('/accountant/transactions');
    }
    public function outcomeCategory(Request $request) {
        OutcomeCategory::create(['name'=>$request['name']]);
        return redirect()->back();
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
    public function by_month(Request $request){
        $month = $request['month'];
        $year = $request['year'];
        $end_month = $request['month']+1;
        $start_date= strtotime($year .'-'.$month.'-'.'1');
        if($end_month == 12){
            $end_month = 1;
        }
        $end_date = strtotime($year.'-'.$end_month.'-'.'1');
        return redirect('/accountant/transactions/' . $start_date.'/'.$end_date);
    }

}
