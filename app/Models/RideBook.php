<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RideBook extends Model
{
    
    use HasFactory;

    protected $table = 'ride_book'; 

    protected $fillable = [
        'user_id',
        'full_name',
        'address',
        'phone',
        'seats'
    ];
}
