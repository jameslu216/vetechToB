<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservation';
    public $timestamps = false;

    protected $fillable = ['customer_name', 'pet_name', 'clinic_id', 'date'];
}
