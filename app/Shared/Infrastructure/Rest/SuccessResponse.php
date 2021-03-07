<?php

namespace App\Shared\Infrastructure\Rest;

final class SuccessResponse
{
    public static function json(array $data = [], int $status = 200): \Illuminate\Http\JsonResponse
    {
        return response()->json(
            collect($data),
            $status
        );
    }
}
