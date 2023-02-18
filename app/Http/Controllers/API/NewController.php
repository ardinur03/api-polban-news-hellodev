<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewsResource;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $slug = $request->input('slug');
        $content = $request->input('content');

        $news = DB::table('news')
            ->rightJoin('student_center_news', 'news.id', '=', 'student_center_news.new_id')
            ->leftJoin('campus_organizations', 'student_center_news.campus_organization_code', '=', 'campus_organizations.code_campus_organization')
            ->select('news.*', 'student_center_news.campus_organization_code AS code')
            ->where('news.status', '=', 'published')
            ->where('news.deleted_at', '=', null)
            ->union(
                DB::table('news')
                    ->rightJoin('student_association_news', 'news.id', '=', 'student_association_news.new_id')
                    ->where('news.deleted_at', '=', null)
                    ->where('news.status', '=', 'published')
                    ->select('news.*', 'student_association_news.faculty_organizations_code AS code')
            );

        if ($id) {
            $news_first =  $news->where('news.id', '=', $id);

            if ($news_first) {
                return ResponseFormatter::success(
                    $news_first->first(),
                    'Data news berhasil diambil'
                );
            } else {
                return ResponseFormatter::error(
                    null,
                    'Data news tidak ada',
                    404
                );
            }
        }

        if ($title) {
            $news->where('news.title', 'like', '%' . $title . '%');
        }

        if ($slug) {
            $news->where('news.slug', 'like', '%' . $slug . '%');
        }

        if ($content) {
            $news->where('news.content', 'like', '%' . $content . '%');
        }

        return ResponseFormatter::success(
            NewsResource::collection($news->paginate($limit)),
            'Data list news berhasil diambil'
        );
    }
}
