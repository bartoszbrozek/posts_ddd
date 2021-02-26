<?php

namespace App\Shared\Domain;

interface DomainEventDispatcherInterface
{
    public function dispatch(object $event): void;
}
