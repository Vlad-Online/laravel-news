<?php

namespace App\Http\Controllers;

use App\News;
use App\NewsCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('categories', [
            'newsCategories' => NewsCategory::withCount('news')->where('state', 1)->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  Request  $request
     * @param $newsCategorySlug
     *
     * @return Response
     */
    public function show(Request $request, $newsCategorySlug)
    {
        $newsCategory = NewsCategory::where('slug', $newsCategorySlug)->where('state', 1)->withCount('news')->first();
        if (!$newsCategory) {
            return redirect()->route('NewsIndex');
        }
        $categoryNews = $newsCategory->news()->orderBy('created_at', 'desc')->simplePaginate(10);
        $popularNews  = $newsCategory->news()->orderBy('views_count', 'desc')->limit(3)->get();

        return view('category', [
            'newsCategory' => $newsCategory,
            'categoryNews' => $categoryNews,
            'popularNews'  => $popularNews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NewsCategory  $newsCategory
     *
     * @return Response
     */
    public function edit(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NewsCategory  $newsCategory
     *
     * @return Response
     */
    public function update(Request $request, NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NewsCategory  $newsCategory
     *
     * @return Response
     */
    public function destroy(NewsCategory $newsCategory)
    {
        //
    }
}
