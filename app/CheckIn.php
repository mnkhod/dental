<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    //
    protected $fillable = ['shift_id', 'user_id', 'state', 'created_by', 'nurse_id'];
    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
    public function doctor() {
        return $this->hasOne('App\Roles', 'id', 'doctor_id');
    }
    public function shift() {
        return $this->hasOne('App\Time', 'id', 'shift_id');
    }
    public function treatments() {
        return $this->hasMany('App\UserTreatments', 'checkin_id', 'id');
    }


}
