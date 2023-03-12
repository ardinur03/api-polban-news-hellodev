<?php

namespace App\Helpers;

/**
 * Format response.
 */
class ResponseFormatterApiPagination
{
    /**
     * API Response
     *
     * @var array
     */
    protected static $response = [
        'response' => [
            'code' => 200,
            'status' => 'success',
            'message' => null,
        ],
        'data' => null,
        'links' => [
            'first' => null,
            'last' => null,
            'prev' => null,
            'next' => null,
        ],
        'meta' => [
            'current_page' => null,
            'from' => null,
            'last_page' => null,
            'path' => null,
            'per_page' => null,
            'to' => null,
            'total' => null,
        ],
    ];

    /**
     * Give success response.
     */
    public static function success($data = null, $message = null)
    {
        self::$response['response']['message'] = $message;
        self::$response['data'] = $data;
        self::$response['links']['first'] = $data->url(1);
        self::$response['links']['last'] = $data->url($data->lastPage());
        self::$response['links']['prev'] = $data->previousPageUrl();
        self::$response['links']['next'] = $data->nextPageUrl();

        self::$response['meta']['current_page'] = $data->currentPage();
        self::$response['meta']['from'] = $data->firstItem();
        self::$response['meta']['last_page'] = $data->lastPage();
        self::$response['meta']['path'] = $data->path();
        self::$response['meta']['per_page'] = $data->perPage();
        self::$response['meta']['to'] = $data->lastItem();
        self::$response['meta']['total'] = $data->total();

        return response()->json(self::$response, self::$response['response']['code']);
    }

    /**
     * Give error response.
     */
    public static function error($data = null, $message = null, $code = 400)
    {
        self::$response['response']['status'] = 'error';
        self::$response['response']['code'] = $code;
        self::$response['response']['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['response']['code']);
    }
}
