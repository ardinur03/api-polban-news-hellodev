<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequest;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use ProtoneMedia\Splade\SpladeTable;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $globalSearch = AllowedFilter::callback('global', function ($query, $value) {
            $query->where(function ($query) use ($value) {
                Collection::wrap($value)->each(function ($value) use ($query) {
                    $query
                        ->orWhere('title', 'LIKE', "%{$value}%")
                        ->orWhere('status', 'LIKE', "%{$value}%");
                });
            });
        });

        $news = QueryBuilder::for(News::class)
            ->defaultSort('title')
            ->allowedSorts(['title', 'status'])
            ->allowedFilters(['title', 'status', $globalSearch]);

        $status = News::pluck('status', 'status')->toArray();

        return view('admin.news.index', [
            'news' => SpladeTable::for($news)
                ->column(key: 'title', sortable: true, searchable: true)
                ->column(key: 'brief_overview', sortable: true, searchable: true)
                ->column(key: 'reading_time', sortable: true, searchable: true)
                ->column(key: 'status', sortable: true, searchable: true)
                ->column('action')
                ->selectFilter(key: 'status', options: $status)
                ->paginate(5),
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
        Toast::title('Successfully!')
            ->message('New Post Created')
            ->backdrop()
            ->autoDismiss(3);

        return to_route('admin.news.index');
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
        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewRequest $request, News $news)
    {
        $news->update($request->validated());
        Toast::title('Successfully!')
            ->message('Post Updated')
            ->info()
            ->backdrop()
            ->autoDismiss(3);

        return to_route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $news->delete();
        Toast::title('Successfully!')
            ->message('Post Deleted')
            ->danger()
            ->backdrop()
            ->autoDismiss(3);
        return to_route('admin.news.index');
    }
}
