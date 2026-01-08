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

    public function show($id)
{
    $package = Package::findOrFail($id);
    return view('tourpage', compact('package'));
}

    public function destroy($id)
{
    // Find package by ID
    $package = Package::find($id);

    if (!$package) {
        return response()->json([
            'success' => false,
            'message' => 'Package not found.'
        ], 404);
    }

    // Optional: agar package image file bhi delete karna ho
    if ($package->image && file_exists(public_path($package->image))) {
        unlink(public_path($package->image));
    }

    $package->delete();

    return response()->json([
        'success' => true,
        'message' => 'Package deleted successfully.'
    ]);
}

    
}
