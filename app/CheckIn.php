<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    //
    protected $fillable =['user_id','doctor_id','created_at'];
}
