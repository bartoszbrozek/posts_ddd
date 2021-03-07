<?php

namespace App\Component\Post\Port\Rest;

use App\Component\Post\Application\Query\GetAllPostsQuery;
use App\Component\Post\Infrastructure\PostCollection;

class GetAllPostsAction
{
    public function __construct(private GetAllPostsQuery $query)
    {
    }

    public function __invoke(): PostCollection
    {
        return $this->query->query();
    }
}
