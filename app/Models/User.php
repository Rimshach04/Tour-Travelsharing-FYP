<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens; 
class Userregester extends Model
{
    use HasFactory;

    protected $table = 'userregesters';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
    ];
}
