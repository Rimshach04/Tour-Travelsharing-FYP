<?php

namespace App\Http\Controllers;
use App\Models\Feedback;
use App\Models\Feedbacktable;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function storefeedback(Request $request)
    {
        $request->headers->set('Accept', 'application/json');  
        $request->validate([
            'name'    => 'required',
            'rating'  => 'nullable|integer|min:1|max:5',
            'message' => 'required',
        ]);

        $feedback = Feedbacktable::create([
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
        $feedbacks = Feedbacktable::latest()->get(); // fetch all feedbacks, newest first
        return response()->json([
            'success' => true,
            'data' => $feedbacks
        ]);

    }
}
