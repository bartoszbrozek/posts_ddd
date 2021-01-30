<?php

namespace App\Infrastructure\Component\MainPage\Post\Repository\Eloquent;

use App\Core\Port\Component\MainPage\View\PostDTO;
use DateTimeImmutable;

class PostHydrator
{
    public function hydrate(array $data): PostDTO
    {
        return PostDTO::fromArray(
            $this->map($data),
        );
    }

    private function map(array $data): array
    {
        return [
            'id' => $data['id'],
            'title' => $data['title'],
            'content' => $data['content'],
            'userId' => $data['user_id'],
            'createdAt' => new DateTimeImmutable($data['created_at']),
            'updatedAt' => new DateTimeImmutable($data['updated_at']),
        ];
    }
}
