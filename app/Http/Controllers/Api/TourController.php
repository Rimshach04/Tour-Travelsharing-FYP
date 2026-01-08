<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TourBooking;
class TourController extends Controller
{
    public function createTour(Request $request)
    {
        $request->headers->set('Accept', 'application/json');  
        $request->validate([
            'tour_title' => 'required|string|max:255',
            'per_head_price' => 'required|numeric',
            'date' => 'required|date',
            'total_price' => 'required|numeric',
            'adult' => 'required|numeric',
            'children' => 'required|numeric',
            'infant' => 'required|numeric',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric',
            'address' => 'required|string|max:255',
            'booked' => 'boolean'
        ]);
        $tour = tourbooking::create([
            'tour_title' => $request->tour_title,
            'per_head_price' => $request->per_head_price,
            'date' => $request->date,
            'adult' => $request->adult,
            'children' => $request->children,
            'infant' => $request->infant,
            'total_price' => $request->total_price,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'booked' => $request->booked,
            'user_id' => $request->auth_user->id,
        ]);


        $tourData = [
            'tour_title' => $request->tour_title,
            'per_head_price' => $request->per_head_price,
            'date' => $request->date,
            'adult' => $request->adult,
            'children' => $request->children,
            'infant' => $request->infant,
            'total_price' => $request->total_price,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'booked' => $request->booked, // user jo select kare true/false
            'user_id' => $request->auth_user->id,
        ];
        
        // Response me show karwana
        return response()->json([
            'success' => true,
            'data' => $tourData
        ]);
        
    }

   
    public function getTours(Request $request)
    {
        $userId = $request->auth_user->id;

        if (!isset($request->auth_user)) {
            return response()->json([
                'success' => false,
                'message' => 'Token not valid.'
            ], 401);
        }
        $perPage = $request->get('per_page', 5);
        $tours = TourBooking::with('user')  // 🔹 Add this
            ->where('user_id', $userId)
            ->orderBy('id', 'desc')
            ->paginate($perPage);

       return response()->json([
         'success' => true,
         'data' => $tours
             ], 200);
    
    }
    
    public function deleteTour(Request $request, $id)
{
    $user = $request->auth_user->id; 

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Token not valid.'
        ], 401);
    }

   
    $tour = TourBooking::where('id', $id)->where('user_id', $user)->first();
    if (!$tour) {
        return response()->json([
            'success' => false,
            'message' => 'tour not match.'
        ], 404);
    }

    
    $tour->delete();

    return response()->json([
        'success' => true,
        'message' => 'Tour successfully deleted.'
    ]);
}

}
