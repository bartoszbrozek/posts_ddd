<?php

namespace App\Component\Post\Domain\Event;

use App\Component\Post\Domain\Post;
use App\Shared\Domain\DomainEventInterface;

class PostUnpublished implements DomainEventInterface
{
    public function __construct(private Post $post)
    {
    }

    public function getPost(): Post
    {
        return $this->post;
    }
}
