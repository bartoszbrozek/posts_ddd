<?php

namespace App\Shared\Domain;

use Stringable;

abstract class StringVO implements Stringable
{
    public function __construct(protected string $value)
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
