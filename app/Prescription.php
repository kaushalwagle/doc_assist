<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{

    public function patient()
    {
        return $this->hasOne('App\Patient');
    }
}
