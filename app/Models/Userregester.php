<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Important
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Userregester extends Authenticatable implements JWTSubject
{
    use HasApiTokens, Notifiable;

    protected $table = 'userregesters'; // your table name

    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
    ];

    // JWTAuth required methods
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
