<?php

namespace App\Component\Post\Domain\ValueObject;

use App\Shared\Domain\ValueObject\StringVO;
use InvalidArgumentException;

class PostLink extends StringVO
{
    const MAX_LENGTH = 512;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH) {
            return new InvalidArgumentException();
        }

        if (!empty($value) && !filter_var($value, FILTER_VALIDATE_URL)) {
            return new InvalidArgumentException();
        }

        parent::__construct($value);
    }
}
