<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    //
    protected $fillable = ['promotion_code','promotion_name','percentage','promotion_end_date'];
}
