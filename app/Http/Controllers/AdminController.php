<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\CheckIn;
use App\Log;
use App\ProductHistory;
use App\Products;
use App\Role;
use Aloha\Twilio\Support\Laravel\Facade as Twilio;
use App\Transaction;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    //-------------
    //STAFF SECTION
    //-------------
    public function index(){
        $roles = Role::all();
        return view('admin.add_staff',compact('roles'));
    }
    public function add_staff(Request $request){
//        $pass = str_random('6');
//        Twilio::message('+976'.$request['phone_number'],'MonFamily шүдний эмнэлгийн систем. Таны нэвтрэх нэр:'.$request['email'].' '.'Таны нууц үг:'.$pass.'');
        $pass = 'dragon';
        $pass = bcrypt($pass);
        $birth_date_request = strtotime($request['birth_date']);
        $birth_date = date('Y-m-d', $birth_date_request);
        $user = User::create(['last_name'=>$request['last_name'],'name'=>$request['name'],'register'=>$request['register'],'phone_number'=>$request['phone_number'],'email'=>$request['email'],'birth_date'=>$birth_date,'location'=>$request['location'],'description'=>$request['description'],'password'=>$pass,'sex'=>$request['sex']]);
        $role = Role::create(['user_id'=>$user->id, 'role_id'=>$request['role'],'state'=>1]);
        if ($photo = $request->file(['photo'])) {
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('img/uploads', $photo_name);
            $user->photos()->create(['path'=>$photo_name]);
            return redirect('/admin/add_staff');
        }
        else{
            return redirect('/admin/add_staff');
        }
    }
    //---------------
    //PRODUCT SECTION
    //---------------
    public function profile($id){
        $user = User::find($id);
        return view('admin.staff_profile',compact('user'));
    }
    public function fire($id){
        $user=User::find($id);
        $user->role->update(['state'=>0]);
        return redirect('/admin/add_staff/'.$id.'/profile');
    }
    //--------------
    //DASHBOARD
    //--------------
    public function dashboard() {
        $users = User::all()->count();
        $roles =Role::all()->count();
        $users_number = $users - $roles;
        $appointments = Appointment::all()->where('created_at','>',date('Y-m-d 00:00:00'))->count();
        $checkins = CheckIn::where('created_at','>',date('Y-m-d'))->count();
        return view('admin.dashboard',compact('users_number','roles','appointments','checkins'));
    }
    public function logs(){
        $logs=Log::all();
        return view('admin.logs',compact('logs'));
    }
    public function users(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }
    public function user_check($id){
        $user = User::find($id);
        $check_ins = CheckIn::all()->where('state',3)->where('user_id',$id);
        return view('admin.user_check',compact('user','check_ins'));
    }
    public function hospital(){
        $checkins = CheckIn::all()->where('state',3);
        $all_users = User::all();
        $first_time = 0;
        $second_time = 0;
        $a = 0;
        $b = 0;
        $first1= 0;
        $second1=0;
        $corrective_count = 0;
        $preventive_count = 0;
        $therapeutic_count = 0;
        foreach ($all_users as $user){
            $checkins = $user->checkins;
            $checks = $checkins->count();
            foreach ($checkins as $checkin) {
                $user_treatments = $checkin->treatments;
                foreach ($user_treatments as $user_treatment){
                    $treatment = $user_treatment->treatment;
                    if($treatment->category == 2){
                        $a = 1;
                    }
                    elseif ($treatment->category == 2){
                        $b = 1;
                    }
                }
            }
            if($a == 1){
                $preventive_count++;
                if($checks == 1){
                    $first1++;
                }
                elseif ($checks > 1){
                    $second1++;
                }
            }
            elseif ($b == 1){
                $corrective_count++;
            }

        }

        foreach ($all_users as $all_user){
            $checks = CheckIn::all()->where('user_id', $all_user->id)->count();
            if($checks ==1){
                $first_time++;
            }
            elseif ($checks > 1){
                $second_time++;
            }
        }
        $checkins2 = CheckIn::all()->where('state',3);
        $user_checkins = $checkins2->unique('user_id');
        $count1 = 0;
        $count2 = 0;
        $count3 = 0;
        $count = 0;
        $age1_4_males= 0;
        $age1_4_females= 0;
        $age5_9_males = 0;
        $age5_9_females = 0;
        $age10_14_males = 0;
        $age10_14_females = 0;
        $age1_4_males_1= 0;
        $age1_4_females_1= 0;
        $age5_9_males_1 = 0;
        $age5_9_females_1 = 0;
        $age10_14_males_1 = 0;
        $age10_14_females_1 = 0;
        $males = 0;
        $females = 0;
        $check1_male = 0;
        $check2_male = 0;
        $check3_male = 0;
        $check1_female = 0;
        $check2_female = 0;
        $check3_female = 0;

        foreach ($checkins as $checkin){
            $user = $checkin->user;

            $user_treatments = $checkin->treatments;
            $check1 = 0;
            $check2 = 0;
            $check3 = 0;

            foreach ($user_treatments as $user_treatment){
                $treatment = $user_treatment->treatment;
                if($treatment->category == 0){
                    $check1 = 1;

                }
                elseif ($treatment->category == 1){
                    $check2 = 1;
                }
                elseif ($treatment->category == 2){
                    $check3 = 1;
                }
            }
            $count++;

            if($check1 == 1) {
//                if(strtotime("-1 Year")>$birth_date and $birth_date > $year1_4 and $user->sex == 0){
//                    $age1_4_males_1++;
//                }
//                elseif (strtotime("Today")>$birth_date and $birth_date > $year1_4 and $user->sex == 1){
//                    $age1_4_females_1++;
//                }
//                elseif (strtotime("Today")>$birth_date and $birth_date > $year5_9 and $user->sex == 0){
//                    $age5_9_males_1++;
//                }
//                elseif (strtotime("Today")>$birth_date and $birth_date > $year5_9 and $user->sex == 1){
//                    $age5_9_females_1++;
//                }
//                elseif (strtotime("Today")>$birth_date and $birth_date > $year10_14 and $user->sex == 0){
//                    $age10_14_males_1++;
//                }
//                elseif (strtotime("Today")>$birth_date and $birth_date > $year10_14 and $user->sex == 1){
//                    $age10_14_females_1++;
//                }

                $count1++;
            }
            if($check2 == 1) {
                $user->sex==0 ? $check2_male++ : $check2_female++;
                $count2++;
            }
            if($check3 == 1) {
                $user->sex==0 ? $check3_male++ : $check3_female++;
                $count3++;
            }
            $user->sex==0 ? $males++ : $females++;

        }
        foreach ($user_checkins as $user_checkin){
            $user = $user_checkin->user;

            $user->sex==0 ? $check1_male++ : $check1_female++;
            $year1_4 = strtotime("-4 Year");
            $year5_9 = strtotime("-9 Year");
            $year10_14 = strtotime("-14 Year");
            $birth_date = strtotime($user->birth_date);
            if(strtotime("-1 Year")>$birth_date and $birth_date > $year1_4 and $user->sex == 0){
                $age1_4_males++;
            }
            elseif (strtotime("-1 Year")>$birth_date and $birth_date > $year1_4 and $user->sex == 1){
                $age1_4_females++;
            }
            elseif (strtotime("-4 Year")>$birth_date and $birth_date > $year5_9 and $user->sex == 0){
                $age5_9_males++;
            }
            elseif (strtotime("-4 Year")>$birth_date and $birth_date > $year5_9 and $user->sex == 1){
                $age5_9_females++;
            }
            elseif (strtotime("-5 Year")>$birth_date and $birth_date > $year10_14 and $user->sex == 0){
                $age10_14_males++;
            }
            elseif (strtotime("-5 Year")>$birth_date and $birth_date > $year10_14 and $user->sex == 1){
                $age10_14_females++;
            }
        }

        return view('admin.hospital',compact('count1','count2','count3','count',
            'check1_male','check1_female','check2_female','check2_male','check3_male',
            'check3_female','males','females',
            'age1_4_males','age1_4_females','age1_4_females_1','age1_4_males_1','age5_9_females',
            'age5_9_females_1','age5_9_males','age5_9_males_1','age10_14_females','age10_14_females_1',
            'age10_14_males','age10_14_males_1','first1','first_time','second_time','second1',
            'c'));
    }
    public function search(Request $request){
        $input = $request->key;
        $results = User::where('email', 'like', '%'.$input.'%')
            ->orWhere('phone_number', 'like', '%'.$input.'%')
            ->orWhere('name', 'like', '%'.$input.'%')
            ->orWhere('last_name', 'like', '%'.$input.'%')
            ->limit('25');

        return view('admin.search', compact('results', 'input'));
    }
}
