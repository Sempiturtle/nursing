<?php

namespace App\Services;

use App\Models\Article;
use Illuminate\Support\Facades\Cache;

class ArticleService
{
    public function getPublishedArticles($category = null, $limit = 10)
    {
        $query = Article::where('is_published', true)->with('author');

        if ($category) {
            $query->where('category', $category);
        }

        return $query->latest('published_at')->paginate($limit);
    }

    public function getArticleBySlug(string $slug)
    {
        return Article::where('slug', $slug)
            ->where('is_published', true)
            ->firstOrFail();
    }

    public function getCategories()
    {
        return Cache::remember('article_categories', 3600, function () {
            return Article::distinct()->pluck('category');
        });
    }
}
