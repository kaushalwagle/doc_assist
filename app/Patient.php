<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
      'doctor_id', 'dob', 'emergency_contact_name', 'emergency_contact_phone', 'history', 'medical_problems', 'diagnosis',
    ];

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
