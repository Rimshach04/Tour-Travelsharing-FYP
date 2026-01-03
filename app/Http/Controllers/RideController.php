<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RideBook;
use App\Models\Ride;
use Tymon\JWTAuth\Facades\JWTAuth;


// class RideController extends Controller
// {   
//         public function index()
//         {
//             $rides = Ride::all();
//             return response()->json($rides);
//         }







//          $request->headers->set('Accept', 'application/json');  

//      $request->validate([
//          'full_name' => 'required',
//          'address'   => 'required',
//          'phone'     => 'required',
//          'seats'     => 'required'
//      ]);
   
    // $user = $request->get('auth_user');

    // $ride = RideBook::create([
    //     'user_id'   => $user->id,
    //     'full_name' => $request->full_name,
    //     'address'   => $request->address,
    //     'phone'     => $request->phone,
    //     'seats'     => $request->seats
    // ]);

    // return response()->json([
    //     'success' => true,
    //     'message' => 'Ride booked successfully!',
    //     'ride'    => $ride
    // ], 201);
    // }
// }
