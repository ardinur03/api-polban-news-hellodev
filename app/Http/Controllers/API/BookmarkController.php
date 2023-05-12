<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatterApi;
use App\Http\Controllers\Controller;
use App\Http\Resources\BookmarkFetchResource;
use App\Models\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookmarkController extends Controller
{
    public function bookmarkNew(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'news_id' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return ResponseFormatterApi::error(
                ['message' => $validator->errors()],
                'Invalid Data',
                422
            );
        }

        try {

            // cek apakah user sudah bookmark news ini atau belum
            $isBookmarked = Bookmark::where('user_id', $request->user()->id)
                ->where('news_id', $request->news_id)
                ->first();

            if ($isBookmarked) {
                return ResponseFormatterApi::error(
                    [
                        'message' => 'News already bookmarked'
                    ],
                    null,
                    422
                );
            }

            $bookmark = Bookmark::create([
                'user_id' => $request->user()->id,
                'news_id' => $request->news_id,
            ]);



            return ResponseFormatterApi::success(
                $bookmark,
                'Bookmark Created'
            );
        } catch (\Exception $error) {
            return ResponseFormatterApi::error(
                [
                    'message' => $error->getMessage(),
                ],
                'Something went wrong',
                500
            );
        }
    }

    public function bookmarks(Request $request)
    {
        $bookmarks = Bookmark::with('news')->where('user_id', $request->user()->id)
            ->orderBy('created_at', 'DESC')
            ->get();
        return ResponseFormatterApi::success(
            BookmarkFetchResource::collection($bookmarks),
            'Bookmarks fetched'
        );
    }
}
