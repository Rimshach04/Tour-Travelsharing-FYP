<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourBooking extends Model
{
    use HasFactory;

    protected $table = 'tourbooking';

    protected $fillable = [
        'tour_title', 'per_head_price', 'date', 'adult', 'children', 'infant',
        'total_price', 'name', 'phone_number', 'address', 'booked', 'user_id'
    ];
}
