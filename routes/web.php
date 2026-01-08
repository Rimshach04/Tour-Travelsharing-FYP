<?php

use Illuminate\Support\Facades\Route;
  use App\Http\Controllers\Api\AuthController;
  use App\Http\Controllers\DashboardController;
  use App\Http\Controllers\PackageController;

Route::get('/', function () {
    return view('final_project');
});
Route::get('/email', function () {
    return view('email');
});

Route::get('/about', function () {
    return view('about');
});
  Route::get('/review', function () {
      return view('review');
  });

Route::get('/tourpage', function () {
    return view('tourPage');
});
Route::get('/admindashboard', function () {
    return view('admindashboard');
});
Route::get('/tourpage/{id}', [PackageController::class, 'show']);


// Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


