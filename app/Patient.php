<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }

    public function prescriptions()
    {
        return $this->hasMany('App\Prescription');
    }

    public function labReports()
    {
        return $this->hasMany('App\LabReports');
    }

}
