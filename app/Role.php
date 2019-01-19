<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    protected $fillable = [
        'user_id', 'role_id'
    ];
    public function staff() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}
