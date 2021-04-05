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
        $tags = array_map(fn ($e) => [
            'id' => (string) $e->toSnapshot()['id'],
            'value' => (string)$e->toSnapshot()['tagValue']
        ], $data['tags'] ?? []);

        return [
            'id' => $data['id'],
            'title' => $data['title'],
            'link' => $data['link'],
            'content' => $data['content'],
            'userName' => $data['user_name'],
            'createdAt' => is_string($data['created_at']) ? new DateTimeImmutable($data['created_at']) : $data['created_at'],
            'updatedAt' => is_string($data['updated_at']) ? new DateTimeImmutable($data['updated_at']) : $data['updated_at'],
            'tags' => $tags,
        ];
    }
}
