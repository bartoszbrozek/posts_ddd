<?php

namespace App\Infrastructure\EventDispatcher;

use App\Core\Port\EventDispatcher\EventDispatcherInterface;

class LaravelEventDispatcher implements EventDispatcherInterface
{
    public function dispatch(object $event): void
    {
        event($event);
    }
}
