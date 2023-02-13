<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\NewResource;
use App\Models\News;
use Illuminate\Http\Request;

class NewController extends Controller
{
    public function all(Request $request)
    {
        $id = $request->input('id');
        $limit = $request->input('limit', 6);
        $title = $request->input('title');
        $slug = $request->input('slug');

        if ($id) {
            $news = News::find($id);

            if ($news) {
                return ResponseFormatter::success(
                    $news->first(),
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

        $news = News::query();

        if ($title) {
            $news->where('title', 'like', '%' . $title . '%');
        }

        if ($slug) {
            $news->where('slug', 'like', '%' . $slug . '%');
        }
        // return data collection
        return ResponseFormatter::success(
            NewResource::collection($news->paginate($limit)),
            'Data list news berhasil diambil'
        );
    }
}
