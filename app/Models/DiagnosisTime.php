<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisTime extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_time';
    public $timestamps = false;

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id');
    }
}
