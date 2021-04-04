<?php

namespace App\Shared\Domain\ValueObject;

use App\Shared\Domain\Stringable as DomainStringable;
use Stringable;

class StringVO implements Stringable
{
    use DomainStringable;

    public function __construct(private string $value)
    {
    }
}
