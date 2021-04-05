<?php

namespace App\Shared\Infrastructure\Rest;

use Exception;

final class ErrorResponse
{
    public static function json(string $message, array $data = [], int $status = 400, Exception $ex = null): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            ['message' => $message, 'data' => $data, $ex instanceof Exception ? $ex->getTraceAsString() : ''],
            $status
        );
    }
}
