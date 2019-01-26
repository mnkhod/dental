<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    protected $fillable = ['doctor_id','shift_id','date'];

    public function doctor() {
        return $this->hasOne('App\User', 'id', 'doctor_id');
    }
}
