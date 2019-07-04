<?php

namespace App\Http\Controllers;

use App\News;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
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
     * @param $newsCategorySlug
     * @param  News  $news
     *
     * @param $newsSlug
     *
     * @return Response
     */
    public function show($newsCategorySlug, News $news, $newsSlug)
    {
        $news->load('newsCategory');
        if (!$news->state || !$news->newsCategory->state || $news->created_at > Carbon::now()->toDateTimeString() ||
            $news->newsCategory->slug != $newsCategorySlug || $news->slug != $newsSlug) {
            return redirect()->route('NewsIndex');
        }
        $news->views_count++;
        $news->save();

        $popularNews = $news->newsCategory->news()->where('id', '!=', $news->id)->orderBy('views_count',
            'desc')->limit(3)->get();

        return view('news', [
            'news' => $news,
            'popularNews' => $popularNews
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News  $news
     *
     * @return Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  News  $news
     *
     * @return Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News  $news
     *
     * @return Response
     */
    public function destroy(News $news)
    {
        //
    }
}
