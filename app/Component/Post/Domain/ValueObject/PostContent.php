<?php

namespace App\Component\Post\Domain\ValueObject;

use App\Shared\Domain\Stringable;
use InvalidArgumentException;

final class PostContent
{
    private const MIN_LENGTH = 3;
    private const MAX_LENGTH = 65535;

    use Stringable;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($this->value) > self::MAX_LENGTH || strlen($this->value) < self::MIN_LENGTH) {
            throw new InvalidArgumentException("Invalid content");
        }
    }
}
