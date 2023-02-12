<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequest;
use App\Models\News;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => SpladeTable::for(News::class)->column(key: 'title', sortable: true, searchable: true)->column(key: 'brief_overview', sortable: true, searchable: true)->column(key: 'reading_time', sortable: true, searchable: true)->column(key: 'status', sortable: true, searchable: true)->paginate(15),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewRequest $request)
    {
        $news = $request->validated();
        $news['slug'] = Str::slug($news['title']);
        $news['reading_time'] = Str::length($news['content']) / 1000;
        $news['user_id'] = auth()->user()->id;
        $news['status'] = Str::of($news['status'])->lower();
        News::create($news);
        return redirect()->route('admin.news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        //
    }
}
