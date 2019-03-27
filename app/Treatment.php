<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    //
    protected $fillable = ['name','category','price','selection_type'];

    public function treatmentSelection() {
        return $this->hasMany('App\TreatmentSelections', 'treatment_id', 'id');
    }
}
