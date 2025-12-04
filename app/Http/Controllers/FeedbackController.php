<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function storefeedback(Request $request)
    {
        $request->validate([
            'name'    => 'required',
            'rating'  => 'nullable|integer|min:1|max:5',
            'message' => 'required',
        ]);

        $feedback = Feedback::create([
            'user_id' => auth()->id(),
            'name'    => $request->name,
            'rating'  => $request->rating,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully',
            'data'    => $feedback
        ], 201);
    }

    
    public function getfeedback()
    {
        return response()->json(Feedback::latest()->get());
    }
}
