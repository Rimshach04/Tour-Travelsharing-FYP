<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;

    protected $fillable = [
        'from','to','car','driver','phone','payment','departure_time','departure_date','total_seats','booked_seats'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
