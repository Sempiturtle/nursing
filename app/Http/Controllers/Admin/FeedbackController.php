<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->paginate(15);
        $avgRating = round(Feedback::avg('rating') ?: 0, 1);
        
        return view('admin.feedback.index', compact('feedbacks', 'avgRating'));
    }

    public function destroy(Feedback $feedback)
    {
        $feedback->delete();
        return back()->with('success', 'Feedback entry removed.');
    }
}
