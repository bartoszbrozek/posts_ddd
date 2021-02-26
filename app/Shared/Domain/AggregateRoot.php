<?php

namespace App\Shared\Domain;

abstract class AggregateRoot
{
    /**
     * @var DomainEvent[] array
     */
    protected $events = [];

    public function toSnapshot(): array
    {
        return get_object_vars($this) ?? [];
    }

    public function popEvents(): array
    {
        $events = $this->events;
        $this->events = [];

        return $events;
    }

    protected function raise(DomainEventInterface $event): void
    {
        $this->events = $event;
    }
}
