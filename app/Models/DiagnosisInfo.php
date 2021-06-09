<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisInfo extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_info';
    public $timestamps = false;

    protected $fillable = ['datetime', 'doctor_id'];

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id');
    }
}
