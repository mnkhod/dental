<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserPromotions extends Model
{
    //
    protected $fillable = ['transaction_id','promotion_id','created_by'];
    public function promotion() {
        return $this->hasOne('App\Promotion', 'id', 'promotion_id');
    }
    public function transaction() {
        return $this->hasOne('App\Transaction', 'id', 'transaction_id');
    }
}
