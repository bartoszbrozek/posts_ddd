<?php

namespace App\Core\Port\Component\MainPage\View;

use App\Core\SharedKernel\DTO;
use DateTimeImmutable;

class PostDTO implements DTO
{
    public function __construct(
        private int $id,
        private string $title,
        private string $content,
        private int $userId,
        private DateTimeImmutable $createdAt,
        private DateTimeImmutable $updatedAt,
    ) {
        if (!$createdAt) {
            $this->createdAt = new DateTimeImmutable();
        }

        if (!$updatedAt) {
            $this->updatedAt = new DateTimeImmutable();
        }
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'userId' => $this->userId,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }

    public static function fromArray(array $data)
    {
        return new self(...$data);
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function getCreatedAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTimeImmutable
    {
        return $this->updatedAt;
    }
}
