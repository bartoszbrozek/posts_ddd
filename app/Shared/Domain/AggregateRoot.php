<?php

namespace App\Shared\Domain;

abstract class AggregateRoot
{
    /**
     * @var DomainEvent[] array
     */
    protected $events = [];

    /**
     * Return snapshot of aggregate
     *
     * @return array
     */
    abstract public function toSnapshot(): array;

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
