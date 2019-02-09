<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = ['shift_id','name', 'phone', 'start', 'end'];
}
