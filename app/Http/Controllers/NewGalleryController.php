<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewGalleryRequest;
use App\Models\Gallery;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class NewGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(News $news): View
    {
        $query = Gallery::where('news_id', $news->id);

        if (auth()->user()->id !== $news->user_id) {
            abort(403, 'You are not allowed to access this page.');
        }

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
    public function store(Request $request, News $news)
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

        Toast::success('News Gallery has been created successfully')->backdrop()->autoDismiss(3);

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
        Toast::success('News Gallery has been deleted successfully')->backdrop()->autoDismiss(3);
        return redirect()->route('admin.news.gallery.index', $gallery->news_id);
    }
}
