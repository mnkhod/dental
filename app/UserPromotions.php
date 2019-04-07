<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPromotions extends Model
{
    //
    protected $fillable = ['transaction_id','promotion_id'];
    public function promotion() {
        return $this->hasOne('App\Promotion', 'id', 'promotion_id');
    }
}
