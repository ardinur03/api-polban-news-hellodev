<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatterApi;
use App\Helpers\ResponseFormatterApiPagination;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewDetailResource;
use App\Http\Resources\NewsResource;
use App\Models\UserAssociationOrganization;
use App\Models\UserCampusOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 5);
        $title = $request->input('title');
        $slug = $request->input('slug');
        $content = $request->input('content');
        $date_filter = $request->input('date_filter');
        $scope = $request->input('scope');

        $news = DB::table(function ($query) {
            $query->select('news.*', 'student_center_news.campus_organization_code AS code')
                ->selectRaw("CASE WHEN student_center_news.campus_organization_code IS NOT NULL THEN 'pusat' ELSE 'himpunan' END AS scope")
                ->from('news')
                ->rightJoin('student_center_news', 'news.id', '=', 'student_center_news.new_id')
                ->leftJoin('campus_organizations', 'student_center_news.campus_organization_code', '=', 'campus_organizations.code_campus_organization')
                ->where('news.status', '=', 'published')
                ->whereNull('news.deleted_at')
                ->union(
                    DB::table('news')
                        ->rightJoin('student_association_news', 'news.id', '=', 'student_association_news.new_id')
                        ->whereNull('news.deleted_at')
                        ->where('news.status', '=', 'published')
                        ->select('news.*', 'student_association_news.faculty_organization_code AS code')
                        ->selectRaw("'himpunan' AS scope")
                );
        });

        if ($id) {

            $new_first =  $news->where('id', '=', $id);

            if ($new_first->count() == 0) {
                return ResponseFormatterApi::error(
                    null,
                    'Data news tidak ada',
                    404
                );
            }

            return ResponseFormatterApi::success(
                NewDetailResource::collection($new_first->get()),
                'Data news berhasil diambil'
            );
        }

        if ($title) {
            $news->where('title', 'like', '%' . $title . '%');
        }

        if ($slug) {
            $news->where('slug', 'like', '%' . $slug . '%');
        }

        if ($content) {
            $news->where('content', 'like', '%' . $content . '%');
        }

        if ($date_filter) {
            if ($date_filter == 'latest') {
                $news->orderBy('created_at', 'DESC');
            } else if ($date_filter == 'oldest') {
                $news->orderBy('created_at', 'ASC');
            } else {
                return ResponseFormatterApiPagination::error(
                    null,
                    'Date filter tidak ada',
                    404
                );
            }
        }

        if ($limit == 0) {
            return ResponseFormatterApiPagination::success(
                NewsResource::collection($news->paginate($limit)),
                'Data list news berhasil diambil'
            );
        }

        if ($scope) {
            if ($scope == 'pusat') {
                $news->where('scope', '=', 'pusat');
            } else if ($scope == 'himpunan') {
                $news->where('scope', '=', 'himpunan');
            } else {
                return ResponseFormatterApiPagination::error(
                    null,
                    'Scope tidak ada',
                    404
                );
            }
        }

        return ResponseFormatterApiPagination::success(
            NewsResource::collection($news->paginate($limit)),
            'Data list news berhasil diambil'
        );
    }

    public function slides()
    {
        $slides = DB::table('galleries')
            ->whereIn('news_id', DB::table('news')
                ->where('status', 'published')
                ->whereNull('deleted_at')
                ->orderBy('created_at', 'desc')
                ->limit(10)
                ->pluck('id'))
            ->join('news', 'galleries.news_id', '=', 'news.id')
            ->selectRaw('news.title, galleries.picturePath AS picture_path')
            ->get();

        return ResponseFormatterApi::success(
            $slides,
            'Data slides berhasil diambil'
        );
    }
}
