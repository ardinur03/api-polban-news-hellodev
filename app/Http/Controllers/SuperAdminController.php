<?php

namespace App\Http\Controllers;

use App\Models\News;
use ProtoneMedia\Splade\Facades\SEO;

class SuperAdminController extends Controller
{
    public function index()
    {
        SEO::title('Super Admin Dashboard');
        SEO::description('Super Admin Dashboard');
        return view('super-admin.dashboard', [
            'count_by_user' => News::where('user_id', auth()->id())->where('status', '')->count(),
            'count_by_news_today' => News::where('created_at', '>=', date('Y-m-d'))->count(),
            'count_by_news_published' => News::where('status', 'published')->count(),
            'count_by_news_draft' => News::where('status', 'draft')->count(),
        ]);
    }
}
