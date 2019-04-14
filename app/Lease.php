<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model
{
    //
    protected $fillable=['checkin_id','price','created_by','total'];
}
