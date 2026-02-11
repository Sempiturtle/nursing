<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    protected $feedbackService;

    public function __construct(\App\Services\FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function index()
    {
        $feedbacks = $this->feedbackService->getAllFeedback();
        $averageRating = $this->feedbackService->getAverageRating();
        return view('feedback.index', compact('feedbacks', 'averageRating'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:3',
            'name' => 'nullable|string|max:255',
        ]);

        $this->feedbackService->submitFeedback([
            'user_id' => auth()->id(),
            'name' => (!empty($validated['name']) ? $validated['name'] : (!empty(auth()->user()->name) ? auth()->user()->name : 'A Milky Way Mother')),
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
        ]);

        return back()->with('success', 'Thank you for your feedback! It helps us improve Milky Way.');
    }
}
