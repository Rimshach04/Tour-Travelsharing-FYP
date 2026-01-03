<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

    use HasFactory;

    protected $fillable = [
        'ride_id','full_name','address','phone','seats'
    ];

    public function ride()
    {
        return $this->belongsTo(Ride::class);
    }
}
