<?php

namespace App\Shared\Domain;

abstract class AggregateRoot
{
    public function toSnapshot(): array
    {
        return get_object_vars($this) ?? [];
    }
}
