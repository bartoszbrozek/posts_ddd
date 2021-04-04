<?php

namespace App\Component\Post\Domain\ValueObject;

use InvalidArgumentException;
use App\Shared\Domain\Stringable;

final class PostLink
{
    private const MAX_LENGTH = 512;

    use Stringable;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException();
        }

        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_URL)) {
            throw new InvalidArgumentException("Invalid link");
        }
    }
}
