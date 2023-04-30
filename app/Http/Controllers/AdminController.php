<?php

namespace App\Http\Controllers;

use App\Models\News;
use ProtoneMedia\Splade\Facades\SEO;

class AdminController extends Controller
{
    public function index()
    {
        SEO::title('Admin Dashboard');
        SEO::description('Admin Dashboard');
        return view('admin.dashboard', [
            'count_by_news_today' => News::where('user_id', auth()->id())->where('created_at', '>=', date('Y-m-d'))->count(),
            'count_by_news_published' => News::where('user_id', auth()->id())->where('status', 'published')->count(),
            'count_by_news_draft' => News::where('user_id', auth()->id())->where('status', 'draft')->count(),
        ]);
    }
}
