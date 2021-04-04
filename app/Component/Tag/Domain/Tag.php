<?php

namespace App\Component\Tag\Domain;

use App\Component\Tag\Domain\ValueObject\TagId;
use App\Component\Tag\Domain\ValueObject\TagValue;
use App\Shared\Domain\AggregateRoot;

final class Tag extends AggregateRoot
{
    public function __construct(
        private TagId $id,
        private TagValue $tagValue,
    ) {
    }

    public static function create(
        TagId $id,
        TagValue $tagValue,
    ): Tag {
        return new self($id, $tagValue);
    }

    public function changeValue(TagValue $tagValue): void
    {
        $this->tagValue = $tagValue;
    }

    public function id(): TagId
    {
        return $this->id;
    }

    public function toSnapshot(): array
    {
        return get_object_vars($this) ?? [];
    }
}
