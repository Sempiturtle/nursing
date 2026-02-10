<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    protected $articleService;
    protected $videoService;

    public function __construct(\App\Services\ArticleService $articleService, \App\Services\VideoService $videoService)
    {
        $this->articleService = $articleService;
        $this->videoService = $videoService;
    }

    public function index(Request $request)
    {
        $articles = $this->articleService->getPublishedArticles($request->category);
        $videos = $this->videoService->getVideosByCategory($request->category);
        
        return view('education.index', compact('articles', 'videos'));
    }

    public function info()
    {
        return view('education.info');
    }

    public function tips()
    {
        $articles = $this->articleService->getPublishedArticles('Tips');
        return view('education.category', ['articles' => $articles, 'title' => 'Breastfeeding Tips', 'category' => 'Tips']);
    }

    public function latching()
    {
        $articles = $this->articleService->getPublishedArticles('Latching & Attaching');
        return view('education.category', ['articles' => $articles, 'title' => 'Latching & Attaching', 'category' => 'Latching & Attaching']);
    }

    public function nutrition()
    {
        $articles = $this->articleService->getPublishedArticles('Proper Nutrition');
        return view('education.category', ['articles' => $articles, 'title' => 'Proper Nutrition', 'category' => 'Proper Nutrition']);
    }

    public function showArticle($slug)
    {
        $article = $this->articleService->getArticleBySlug($slug);
        return view('education.article', compact('article'));
    }
}
