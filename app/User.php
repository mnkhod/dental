<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'last_name', 'name', 'email', 'password','sex','location','register','birth_date','description','phone_number'
    ];

    public function role() {
        $this->hasOne('App\Role', 'user_id', 'id');
    }

    public function photos(){
        return $this->morphMany('App\Photo', 'imageable_id','imageable_type');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
