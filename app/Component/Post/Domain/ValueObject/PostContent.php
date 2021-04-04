<?php

namespace App\Component\Post\Domain\ValueObject;

use App\Shared\Domain\ValueObject\StringVO;
use InvalidArgumentException;

final class PostContent extends StringVO
{
    const MIN_LENGTH = 3;
    const MAX_LENGTH = 65535;

    public function __construct(private string $value)
    {
        // Validate max title length
        if (strlen($value) > self::MAX_LENGTH || strlen($value) < self::MIN_LENGTH) {
            return new InvalidArgumentException();
        }

        parent::__construct($value);
    }
}
