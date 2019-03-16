<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorUser extends Model
{
    //
    protected $fillable = ['shift_id', 'user_id','name', 'phone', 'start', 'end', 'created_by'];

}
