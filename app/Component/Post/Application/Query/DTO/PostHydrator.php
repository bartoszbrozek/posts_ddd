<?php

namespace App\Component\Post\Application\Query\DTO;

use DateTimeImmutable;

final class PostHydrator
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
            'uuid' => $data['uuid'],
            'title' => $data['title'],
            'link' => $data['link'],
            'content' => $data['content'],
            'userName' => $data['user_name'],
            'createdAt' => new DateTimeImmutable($data['created_at']),
            'updatedAt' => new DateTimeImmutable($data['updated_at']),
        ];
    }
}
