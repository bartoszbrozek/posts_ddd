<?php

namespace App\Shared\Domain;

use Stringable;
use InvalidArgumentException;
use Ramsey\Uuid\Uuid as RamseyUuid;

class Uuid implements Stringable
{
    public function __construct(
        protected string $uuid
    ) {
        if (!RamseyUuid::isValid($uuid)) {
            throw new InvalidArgumentException();
        }
    }

    public function uuid(): string
    {
        return $this->uuid;
    }

    public static function random(): static
    {
        return new static(RamseyUuid::uuid4()->toString());
    }

    public function __toString(): string
    {
        return $this->uuid;
    }
}
