<?php

namespace App\Component\Post\Application\Query;

use App\Component\Post\Application\Query\DTO\PostHydrator;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Infrastructure\PostCollection;

class GetAllPostsQuery
{
    public function __construct(
        private PostRepository $postRepository,
        private PostHydrator $postHydrator,
    ) {
    }

    public function query(): PostCollection
    {
        return $this->postRepository->findAll();
    }
}
