<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
      'user_id', 'doctor_id', 'dob', 'emergency_contact_name', 'emergency_contact_phone', 'history', 'medical_problems', 'diagnosis',
    ];

    public function doctors()
    {
        return $this->belongsToMany('App\Doctor');
    }



    public function labReports()
    {
        return $this->hasMany('App\LabReports');
    }

}
