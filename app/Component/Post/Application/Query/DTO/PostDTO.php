<?php

namespace App\Component\Post\Application\Query\DTO;

use DateTimeImmutable;
use Illuminate\Contracts\Support\Arrayable;

final class PostDTO implements Arrayable
{
    public function __construct(
        private string $id,
        private string $title,
        private string $link,
        private string $content,
        private string $userName,
        private DateTimeImmutable $createdAt,
        private ?DateTimeImmutable $updatedAt,
        private array $tags = [],
    ) {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function link(): string
    {
        return $this->link;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function userName(): string
    {
        return $this->userName;
    }

    public function createdAt(): DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function updatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function tags(): array
    {
        return $this->tags;
    }

    public static function fromArray(array $data): PostDTO
    {
        return new self(...$data);
    }

    public function toArray()
    {
        return get_object_vars($this);
    }
}
