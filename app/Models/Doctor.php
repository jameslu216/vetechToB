<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\User;

class Doctor extends User
{
    use HasFactory, Notifiable;

    protected $table = 'Doctor';
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    public function diagnosisTimes()
    {
        return $this->hasMany('App\Models\DiagnosisTime', 'doctor_id', 'id');
    }
}
