<?php

namespace App\Services;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseService
{
    /**
     * @param array $data
     * @param string $status
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public static function response(array $data = [], string $message = 'OK', string $status = 'SUCCESS', int $code = Response::HTTP_OK): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

    /**
     * @return array
     */
    public static function responseDataArray(): array
    {
        return array(
            'status' => 'SUCCESS',
            'message' => '',
            'code' => Response::HTTP_OK,
            'data' => ''
        );
    }
}
