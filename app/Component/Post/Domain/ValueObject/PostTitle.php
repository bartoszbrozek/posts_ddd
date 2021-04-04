<?php

namespace App\Component\Post\Domain\ValueObject;

use App\Shared\Domain\Stringable;
use InvalidArgumentException;

final class PostTitle
{
    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 255;

    use Stringable;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH || strlen($value) < self::MIN_LENGTH) {
            throw new InvalidArgumentException("Invalid title");
        }
    }
}
