<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabReport extends Model
{

    public function patient()
    {
        return $this->hasOne('App\Patient');
    }
}
