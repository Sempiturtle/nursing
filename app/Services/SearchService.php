<?php

namespace App\Services;

use App\Models\Article;
use App\Models\Video;
use App\Models\Clinic;

class SearchService
{
    public function search(string $query)
    {
        $articles = Article::where('is_published', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%")
                  ->orWhere('category', 'like', "%{$query}%");
            })->get();

        $videos = Video::where('title', 'like', "%{$query}%")
            ->orWhere('description', 'like', "%{$query}%")
            ->orWhere('category', 'like', "%{$query}%")
            ->get();

        $clinics = Clinic::where('name', 'like', "%{$query}%")
            ->orWhere('address', 'like', "%{$query}%")
            ->orWhere('services', 'like', "%{$query}%")
            ->get();

        return [
            'articles' => $articles,
            'videos' => $videos,
            'clinics' => $clinics,
            'total' => $articles->count() + $videos->count() + $clinics->count()
        ];
    }
}
