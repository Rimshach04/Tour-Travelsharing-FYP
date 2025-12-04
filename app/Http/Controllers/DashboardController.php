<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('final_project'); // returns resources/views/final_project.blade.php
    }
}
