<?php

namespace App\Services;

use App\Models\Video;

class VideoService
{
    public function getVideosByCategory($category = null)
    {
        $query = Video::query();
        if ($category) {
            $query->where('category', $category);
        }
        return $query->latest()->get();
    }

    public function getCategories()
    {
        return Video::distinct()->pluck('category');
    }
}
