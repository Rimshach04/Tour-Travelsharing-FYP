<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TourController;
use App\Http\Controllers\FeedbackController;
use App\Http\Middleware\MyJWTMiddleware;

Route::post('/signup', [AuthController::class, 'signup'])->name('signup');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/user/{email}', [AuthController::class, 'getUser']);
Route::delete('/user/{email}', [AuthController::class, 'deleteUser']);
Route::post('/create-tour', [TourController::class, 'createTour'])->middleware(MyJWTMiddleware::class);
Route::get('/get-tours', [TourController::class, 'getTours'])->middleware(MyJWTMiddleware::class);
Route::delete('/delete-tour/{id}', [TourController::class, 'deleteTour'])->middleware(MyJWTMiddleware::class);

Route::post('/feedback', [FeedbackController::class, 'storefeedback'])->middleware(MyJWTMiddleware::class);
Route::get('/feedback', [FeedbackController::class, 'getfeedback'])->middleware(MyJWTMiddleware::class);

