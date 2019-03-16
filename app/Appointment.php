<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = ['shift_id', 'user_id','name', 'phone', 'start', 'end', 'state','created_by'];

    public function shift() {
        return $this->hasOne('App\Time', 'id', 'shift_id');
    }
}
