<?php

namespace App\Shared\Infrastructure\Event;

use App\Shared\Domain\DomainEventDispatcherInterface;

class LaravelDispatcher implements DomainEventDispatcherInterface
{
    public function dispatch(object $event): void
    {
        dispatch($event);
    }
}
