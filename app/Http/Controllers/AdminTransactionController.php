<?php

namespace App\Http\Controllers;

use App\Log;
use App\OutcomeCategory;
use App\Transaction;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminTransactionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index() {
        $transactions = Transaction::all()->where('created_at','>=', date('Y-m-d', strtotime('first day of this month')))->sortByDesc('id');
        $roles = Role::all();
        $types = OutcomeCategory::all();
        $start_date = strtotime('first day of this month');
        $end_date = strtotime('Today');
        return view('admin.transaction', compact('transactions', 'roles', 'start_date', 'end_date', 'types'));
    }
    

    public function search($start_date, $end_date) {
        $transactions = Transaction::all()->whereBetween('created_at', [date('Y-m-d', $start_date), date('Y-m-d', $end_date)])->sortByDesc('id');
        $roles = Role::all();
        $types = OutcomeCategory::all();
        return view('admin.transaction', compact('transactions', 'roles', 'start_date', 'end_date', 'types'));
    }


    public function date(Request $request) {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $start_date = explode('/', $start_date);
        $start_date = strtotime($start_date[2] . '-' . $start_date[0] . '-' . $start_date[1]);
        $end_date = explode('/', $end_date);
        $end_date = strtotime($end_date[2] . '-' . $end_date[0] . '-' . $end_date[1]);;
        return redirect('/admin/transaction/' . $start_date.'/'.$end_date);
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
        return redirect('/admin/transaction/' . $start_date.'/'.$end_date);
    }

}
