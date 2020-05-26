<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTreatments extends Model
{
    //
    protected $fillable = ['user_id','treatment_id','tooth_id','value','checkin_id','treatment_selection_id','price'];
    public function treatment() {
        return $this->hasOne('App\Treatment', 'id', 'treatment_id');
    }
    public function user(){
        return $this->hasOne('App\CheckIn','id','checkin_id');
    }
}
