<?php

namespace App\Shared\Domain\ValueObject;

use Stringable;

abstract class StringVO implements Stringable
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }


    public function __toString(): string
    {
        return $this->value;
    }
}
