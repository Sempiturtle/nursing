<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    protected $searchService;

    public function __construct(\App\Services\SearchService $searchService)
    {
        $this->searchService = $searchService;
    }

    public function index(Request $request)
    {
        $query = $request->input('q');
        $results = $query ? $this->searchService->search($query) : null;
        
        return view('search.results', compact('results', 'query'));
    }
}
