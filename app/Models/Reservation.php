<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';
    public $timestamps = false;

    protected $fillable = ['customer_name', 'pet_name', 'clinic_id', 'datetime'];

    public function datetime() {
        return $this->attributes['datetime'];
    }

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
