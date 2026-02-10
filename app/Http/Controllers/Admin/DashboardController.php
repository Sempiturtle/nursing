<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Video;
use App\Models\Clinic;
use App\Models\Feedback;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'articles'  => Article::count(),
            'videos'    => Video::count(),
            'clinics'   => Clinic::count(),
            'feedback'  => Feedback::count(),
        ];

        $avgRating       = round(Feedback::avg('rating') ?: 0, 1);
        $recentFeedback  = Feedback::latest()->take(6)->get();
        $totalUsers      = User::where('is_admin', false)->count();

        return view('admin.dashboard', compact(
            'stats',
            'avgRating',
            'recentFeedback',
            'totalUsers'
        ));
    }
}
