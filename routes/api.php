<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\RideController;
use App\Http\Controllers\RideinformationController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\FeedbackController;
use App\Http\Middleware\MyJWTMiddleware;

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user/{email}', [AuthController::class, 'getUser']);
Route::get('users', [AuthController::class, 'getUsers']);

Route::delete('/user/{email}', [AuthController::class, 'deleteUser']);




Route::post('/create-tour', [TourController::class, 'createTour'])->middleware(MyJWTMiddleware::class);
Route::get('/get-tours', [TourController::class, 'getTours'])->middleware(MyJWTMiddleware::class);
Route::delete('/delete-tour/{id}', [TourController::class, 'deleteTour'])->middleware(MyJWTMiddleware::class);




// Route::get('/rides', [RideController::class, 'index']); // List all rides
// Route::post('/bookride', [BookingController::class, 'store']); 
 Route::post('/book-ride', [RideController::class, 'store'])->name('bookride')->middleware(MyJWTMiddleware::class);;


Route::post('/feedback', [FeedbackController::class, 'storefeedback'])->middleware(MyJWTMiddleware::class);
 Route::get('/feedback', [FeedbackController::class, 'getfeedback']);




Route::post('/packages', [PackageController::class, 'store']);
 Route::get('/getpackages', [PackageController::class, 'index']);
Route::delete('/delpackages/{id}', [PackageController::class, 'destroy']);

 Route::post('/rides', [RideinformationController::class, 'rideinfo']);