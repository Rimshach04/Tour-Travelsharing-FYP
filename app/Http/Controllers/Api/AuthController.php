<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Userregester;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Auth;
use App\Models\User;                  
use Illuminate\Support\Facades\DB;   
use Carbon\Carbon;                    
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    
    public function signup(Request $request)
    {
        $request->headers->set('Accept', 'application/json');
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:userregesters',
            'phone' => 'required|string|min:10',
            'password' => 'required|min:6',
            'role' => 'in:user,admin,driver'
        ]);

        $user = Userregester::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);
    
        // $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => true,
            'message' => 'User registered successfully!',
            'data' => $user,
            // 'access_token' => $token,
            // 'token_type' => 'Bearer'
        ], 201);
    }
    

    public function login(Request $request)
{
    $request->headers->set('Accept', 'application/json');

    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');

    if (!$token = JWTAuth::attempt($credentials)) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid email or password',
        ], 401);
    }
    $user = auth()->user();

    return response()->json([
        'status' => true,
        'user' => $user,
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}


public function getUser($email)
{
    $user = \App\Models\Userregester::where('email', $email)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found'
        ], 404);
    }

    return response()->json([
        'status' => true,
        'message' => 'User info fetched successfully',
        'data' => $user
    ], 200);
}

public function getUsers(Request $request)
{
    $perPage = $request->get('per_page', 10); // Default 10 users per page
    $users = Userregester::paginate($perPage);

    return response()->json([
        'status' => true,
        'message' => 'Users fetched successfully',
        'data' => $users
    ], 200);
}



public function deleteUser($email)
{
    $user = \App\Models\Userregester::where('email', $email)->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'User not found'
        ], 404);
    }

    $user->delete();

    return response()->json([
        'status' => true,
        'message' => 'User deleted successfully'
    ], 200);
}


}


