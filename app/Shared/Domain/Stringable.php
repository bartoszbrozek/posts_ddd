<?php

namespace App\Shared\Domain;

trait Stringable
{
    public function value(): string
    {
        return $this->value;
    }

    public function __toString(): string
    {
        return $this->value;
    }
}
