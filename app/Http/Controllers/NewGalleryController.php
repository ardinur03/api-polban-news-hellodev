<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewGalleryRequest;
use App\Models\Gallery;
use App\Models\News;
use ProtoneMedia\Splade\SpladeTable;

class NewGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news)
    {
        $query = Gallery::where('news_id', $news->id);

        return view('admin.news.news_galleries.index', [
            'title' => 'News Galleries',
            'news' => $news,
            'news_galleries' => SpladeTable::for($query)
                ->column(key: 'news_id', sortable: true, searchable: true)
                ->column(key: 'image', sortable: true, searchable: true)
                ->column('action')
                ->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(News $news)
    {
        return view('admin.news.news_galleries.create', [
            'title' => 'Create News Galleries',
            'news' => $news,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewGalleryRequest $request, News $news)
    {
        $image = $request->file('files');
        if ($request->hasFile('files')) {
            foreach ($image as $file) {
                $path = $file->store('public/gallery');

                Gallery::create([
                    'news_id' => $news->id,
                    'picturePath' => $path
                ]);
            }
        }

        return redirect()->route('admin.news.gallery.index', $news->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('admin.news.gallery.index', $gallery->news_id);
    }
}
