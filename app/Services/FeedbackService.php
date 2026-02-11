<?php

namespace App\Services;

use App\Models\Feedback;

class FeedbackService
{
    public function submitFeedback(array $data)
    {
        return Feedback::create($data);
    }

    public function getAllFeedback()
    {
        return Feedback::latest()->get();
    }

    public function getLatestFeedback($limit = 5)
    {
        return Feedback::latest()->take($limit)->get();
    }

    public function getAverageRating()
    {
        return Feedback::avg('rating') ?: 0;
    }
}
