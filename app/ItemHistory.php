<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemHistory extends Model
{
    //
    protected $fillable = ['item_id','quantity','created_by'];
}
