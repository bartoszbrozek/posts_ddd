<?php

namespace App\Shared\Infrastructure\Rest;

final class SuccessResponse
{
    public static function json(array $data = [], string $message = '', int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            ['data' => collect($data), 'message' => $message],
            $status
        );
    }
}
