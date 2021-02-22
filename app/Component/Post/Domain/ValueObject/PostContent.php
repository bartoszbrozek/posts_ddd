<?php

namespace App\Component\Post\Domain\ValueObject;

use App\Shared\Domain\StringVO;
use InvalidArgumentException;

class PostContent extends StringVO
{
    const MAX_LENGTH = 65535;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH) {
            return new InvalidArgumentException();
        }

        parent::__construct($value);
    }
}
