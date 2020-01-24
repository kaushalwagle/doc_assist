<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nmc','specialization', 'title', 'education', 'availability', 'user_id',
    ];

    public function patients()
    {
        return $this->belongsToMany('App\Patient');
    }
}
