<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiagnosisRecord extends Model
{
    use HasFactory;

    protected $table = 'diagnosis_record';
    public $timestamps = false;

    protected $fillable = ['id', 'clinic_id', 'customer_name', 'customer_id', 'phone', 'pet_name', 'datetime', 'diagnosis_note'];

    public function clinic()
    {
        return $this->belongsTo('App\Models\Clinic', 'clinic_id', 'id');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor', 'doctor_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_id', 'id');
    }

}
