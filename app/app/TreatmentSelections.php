<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TreatmentSelections extends Model
{
    //
    protected $fillable = ['treatment_id', 'name', 'price', 'limit'];
}
