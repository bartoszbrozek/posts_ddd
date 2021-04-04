<?php

namespace App\Component\Tag\Domain\ValueObject;

use App\Shared\Domain\ValueObject\StringVO;
use InvalidArgumentException;

class TagValue extends StringVO
{
    const MAX_LENGTH = 64;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException();
        }

        parent::__construct($value);
    }
}
