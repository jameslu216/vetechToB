<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    public $timestamps = false;

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor', 'user_id', 'id');
    }

    public function customers()
    {
        return $this->hasMany('App\Models\Customer', 'user_id', 'id');
    }
}
