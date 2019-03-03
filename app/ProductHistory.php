<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductHistory extends Model
{
    //
    protected $fillable = ['product_id', 'user_id', 'quantity', 'description','created_by'];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
