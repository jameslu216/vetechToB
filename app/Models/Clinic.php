<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;

    protected $table = 'clinic';
    public $timestamps = false;

    public function serveTimes()
    {
        return $this->hasMany('App\Models\ServeTime', 'clinic_id', 'id');
    }

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor', 'clinic_id', 'id');
    }
}
