<?php

namespace App\Component\Tag\Domain\ValueObject;

use App\Shared\Domain\Stringable;
use InvalidArgumentException;

final class TagValue
{
    const MAX_LENGTH = 64;

    use Stringable;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException();
        }
    }
}
