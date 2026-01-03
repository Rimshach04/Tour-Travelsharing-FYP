<?php

namespace App\Http\Controllers;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function store(Request $request)
    {
       
        $imagePath = null;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $imagePath = 'images/'.$imageName;
    }

        $package = Package::create([
            'name' => $request->name,
            'price' => $request->price,
            'duration' => $request->duration,
            'location' => $request->location,
            'image' => $imagePath,
            'description' => $request->description,
        ]);

      
        return response()->json([
            'status' => true,
            'message' => 'Package added successfully',
            'data' => $package
        ]);
    }

    public function index()
    {
        $packages = Package::select('id', 'name', 'duration', 'price','description' ,'image')->get();

    return response()->json([
        'status' => true,
        'data' => $packages
    ]);
    }
    
}
