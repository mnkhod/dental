<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = [
        'price', 'type', 'type_id', 'description','created_by'
    ];
}
