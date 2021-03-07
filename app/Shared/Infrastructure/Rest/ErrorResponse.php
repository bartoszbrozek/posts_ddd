<?php

namespace App\Shared\Infrastructure\Rest;

final class ErrorResponse
{
    public static function json(string $message, array $data = [], int $status = 400): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            ['message' => $message, 'data' => $data,],
            $status
        );
    }
}
