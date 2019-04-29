<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPromotions extends Model
{
    //
    protected $fillable = ['checkin_id','promotion_id','created_by'];
    public function promotion() {
        return $this->hasOne('App\Promotion', 'id', 'promotion_id');
    }
    public function checkin() {
        return $this->hasOne('App\Checkin', 'id', 'checkin_id');
    }
}
