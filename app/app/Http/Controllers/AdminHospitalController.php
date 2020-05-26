<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class AdminHospitalController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index() {
        $count = 0;
        $count_male = 0;
        $count_female = 0;
        $count_first = 0;
        $count_again = 0;

        $age_male = array();
        $age_female = array();
        for ($i=0;$i<16;$i++) {
            $age_male[$i] = 0;
            $age_female[$i] = 0;
        }

        $treatment_type_2 = 0;
        $treatment_type_2_count = 0;
        $treatment_type_2_count_male = 0;
        $treatment_type_2_count_female = 0;
        $treatment_type_2_count_first = 0;
        $treatment_type_2_count_again = 0;


        foreach (User::all() as $user) {
            $beginning =  strtotime(date('Y-m-d', strtotime('first day of this month')));
            $has = 0;//for check if user has checkin
            foreach ($user->checkins->whereIn('state', [3,4])->where('created_at','>=', date('Y-m-d', $beginning)) as $checkin) {
                foreach ($checkin->treatments as $treatment_user) {
                    if($treatment_user->treatment->category == 2)
                        $treatment_type_2 = 1;
                }
                $has = 1;
            }

            if($has == 1) {

                $date = strtotime($user->checkins->whereIn('state', [3,4])->first()->created_at);

                if($treatment_type_2 == 1) {
                    $user->sex == 0 ? $treatment_type_2_count_male++ : $treatment_type_2_count_female++;
                    $treatment_type_2_count++;
                    if($date > $beginning) {
                        $treatment_type_2_count_first++;
                    } else {
                        $treatment_type_2_count_again++;
                    }
                }

                if($date > $beginning) {
                    $count_first++;
                } else {
                    $count_again++;
                }

                $user_age = date_diff(date_create($user->birth_date), date_create('today'))->y;
                if($user->sex == 0) {
                    $user_age >= 60 ? $age_male[15]++ : $age_male[(int)((int)($user_age)/4)]++;
                    $count_male++;
                } else {
                    $user_age >= 60 ? $age_female[15]++ : $age_female[(int)((int)($user_age)/4)]++;
                    $count_female++;
                }
                $count++;
            }

        }
        $start_date = $beginning;
        return view('admin.hospital', compact('count', 'count_male', 'count_female', 'count_first', 'count_again',
            'age_male', 'age_female', 'treatment_type_2_count', 'treatment_type_2_count_male', 'treatment_type_2_count_female',
            'treatment_type_2_count_first', 'treatment_type_2_count_again', 'start_date'));
    }
    public function date($from, $to) {

        $count = 0;
        $count_male = 0;
        $count_female = 0;
        $count_first = 0;
        $count_again = 0;

        $age_male = array();
        $age_female = array();
        for ($i=0;$i<16;$i++) {
            $age_male[$i] = 0;
            $age_female[$i] = 0;
        }

        $treatment_type_2 = 0;
        $treatment_type_2_count = 0;
        $treatment_type_2_count_male = 0;
        $treatment_type_2_count_female = 0;
        $treatment_type_2_count_first = 0;
        $treatment_type_2_count_again = 0;


        foreach (User::all() as $user) {
            $beginning =  $from;
            $has = 0;//for check if user has checkin
            foreach ($user->checkins->whereIn('state', [3,4])->whereBetween('created_at', [date('Y-m-d', $from), date('Y-m-d', $to)]) as $checkin) {
                foreach ($checkin->treatments as $treatment_user) {
                    if($treatment_user->treatment->category == 2)
                        $treatment_type_2 = 1;
                }
                $has = 1;
            }

            if($has == 1) {

                $date = strtotime($user->checkins->whereIn('state', [3,4])->first()->created_at);

                if($treatment_type_2 == 1) {
                    $user->sex == 0 ? $treatment_type_2_count_male++ : $treatment_type_2_count_female++;
                    $treatment_type_2_count++;
                    if($date > $beginning) {
                        $treatment_type_2_count_first++;
                    } else {
                        $treatment_type_2_count_again++;
                    }
                }

                if($date > $beginning) {
                    $count_first++;
                } else {
                    $count_again++;
                }

                $user_age = date_diff(date_create($user->birth_date), date_create('today'))->y;
                if($user->sex == 0) {
                    $user_age >= 60 ? $age_male[15]++ : $age_male[(int)((int)($user_age)/4)]++;
                    $count_male++;
                } else {
                    $user_age >= 60 ? $age_female[15]++ : $age_female[(int)((int)($user_age)/4)]++;
                    $count_female++;
                }
                $count++;
            }

        }
        $start_date = $from;
        $end_date = $to;
        return view('admin.hospital', compact('count', 'count_male', 'count_female', 'count_first', 'count_again',
            'age_male', 'age_female', 'treatment_type_2_count', 'treatment_type_2_count_male', 'treatment_type_2_count_female',
            'treatment_type_2_count_first', 'treatment_type_2_count_again', 'start_date', 'end_date'));
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
        return redirect('/admin/hospital/' . $start_date.'/'.$end_date);
    }
    public function by_date(Request $request) {
        $start_date = $request['start_date'];
        $end_date = $request['end_date'];
        $start_date = explode('/', $start_date);
        $start_date = strtotime($start_date[2] . '-' . $start_date[0] . '-' . $start_date[1]);
        $end_date = explode('/', $end_date);
        $end_date = strtotime($end_date[2] . '-' . $end_date[0] . '-' . $end_date[1]);;
        return redirect('/admin/hospital/' . $start_date.'/'.$end_date);
    }
}
