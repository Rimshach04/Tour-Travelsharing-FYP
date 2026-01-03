<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Ride;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ride_id' => 'required|exists:rides,id',
            'full_name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string',
            'seats' => 'required|integer|min:1',
        ]);

        $ride = Ride::find($request->ride_id);

        if($ride->booked_seats + $request->seats > $ride->total_seats){
            return response()->json(['error'=>'Not enough seats available'], 400);
        }

        // Create booking
        $booking = Booking::create([
            'ride_id' => $ride->id,
            'full_name' => $request->full_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'seats' => $request->seats,
        ]);

        // Update booked seats
        $ride->booked_seats += $request->seats;
        $ride->save();

        return response()->json(['success'=>'Booking confirmed', 'booking' => $booking]);
    }
}
