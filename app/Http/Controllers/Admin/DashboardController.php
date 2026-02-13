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
        $totalArticles   = Article::count();
        $totalVideos     = Video::count();
        $totalClinics    = Clinic::count();
        $totalFeedback   = Feedback::count();
        $avgFeedback     = Feedback::avg('rating') ?: 0;
        $totalUsers      = User::where('is_admin', false)->count();
        $recentFeedback  = Feedback::latest()->take(6)->get();

        return view('admin.dashboard', compact(
            'totalArticles',
            'totalVideos',
            'totalClinics',
            'totalFeedback',
            'avgFeedback',
            'totalUsers',
            'recentFeedback'
        ));
    }
}
