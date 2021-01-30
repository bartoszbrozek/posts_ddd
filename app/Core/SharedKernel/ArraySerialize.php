<?php

namespace App\Core\SharedKernel;

interface ArraySerialize
{
    public function toArray(): array;
    public static function fromArray(array $data);
}
