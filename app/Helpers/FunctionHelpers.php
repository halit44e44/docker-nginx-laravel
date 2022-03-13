<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class FunctionHelpers
{
    /***
     * @param bool $status
     * @param string $msg
     * @param string $err
     * @param int $statusCode
     * @return JsonResponse
     */
    public static function exceptionError(bool $status, string $msg, string $err, int $statusCode): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'msg' => $msg,
            'err' => $err
        ],$statusCode);
    }
}
