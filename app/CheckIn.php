<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    //
    protected $fillable = ['shift_id', 'user_id', 'state', 'created_by'];
}
