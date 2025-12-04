<?php

use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\Api\AuthController;
  use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('final_project');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/tourpage', function () {
    return view('tourPage');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


