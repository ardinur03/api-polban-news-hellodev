<?php

namespace App\Http\Controllers;

use App\Http\Requests\NewRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\StudentAssociationNew;
use App\Models\StudentCenterNew;
use App\Models\User;
use App\Tables\NewsTable;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use ProtoneMedia\Splade\Facades\Toast;

class NewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.news.index', [
            'news' => NewsTable::class
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data =  [
            'title' => 'Create New',
            'categories' => Category::all(),
        ];

        return view('admin.news.create', $data);
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
        $news['slug'] = SlugService::createSlug(News::class, 'slug', $news['title']);
        $news['reading_time'] = str_word_count($news['content']) / 1000;
        $news['user_id'] = auth()->user()->id;
        $news['status'] = Str::of($news['status'])->lower();

        if (User::find(auth()->user()->id)->hasRole('admin-pusat')) {
            StudentCenterNew::create([
                'new_id' => News::create($news)->id,
                'category_id' => $news['category_id'],
                'campus_organization_code' => Auth::user()->userCampusOrganization->campus_organization_code,
            ]);
        } else if (User::find(auth()->user()->id)->hasRole('admin-himpunan')) {
            StudentAssociationNew::create([
                'new_id' => News::create($news)->id,
                'category_id' => $news['category_id'],
                'faculty_organization_code' => Auth::user()->userAssociationOrganization->faculty_organization_code,
            ]);
        } else {
            Toast::title('Failed!')->message('You are not authorized to create new')->backdrop()->autoDismiss(3);
        }

        Toast::title('Successfully!')->message('New Post Created')->backdrop()->autoDismiss(3);

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
        $this->authorize('update', $news);

        if (User::find(auth()->user()->id)->hasRole('admin-pusat')) {
            $news = StudentCenterNew::with(['new', 'category'])->where('new_id', $news->id)->firstOrFail();
        } else {
            $news = StudentAssociationNew::with(['new', 'category'])->where('new_id', $news->id)->firstOrFail();
        }

        $news->category_id = $news->category->id;
        $news->title = $news->new->title;
        $news->brief_overview = $news->new->brief_overview;
        $news->content = $news->new->content;
        $news->status = $news->new->status;
        $news->category_id = $news->category->id;

        $data = [
            'title' => 'Edit New',
            'news' => $news,
            'categories' => Category::all(),
        ];

        return view('admin.news.edit', $data);
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
        $request_data = $request->validated();
        $request_data['reading_time'] = (str_word_count($request_data['content']) / 200);
        $news->update($request_data);
        if (User::find(auth()->user()->id)->hasRole('admin-pusat')) {
            $news->studentCenterNew->update(['category_id' => $request->category_id]);
        } else {
            $news->studentAssociationNew->update(['category_id' => $request->category_id]);
        }
        Toast::title('Successfully!')->message('Post Updated')->info()->backdrop()->autoDismiss(3);
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
        Toast::title('Successfully!')->message('Post Deleted')->danger()->backdrop()->autoDismiss(3);
        return to_route('admin.news.index');
    }
}
