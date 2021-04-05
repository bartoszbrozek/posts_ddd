<?php

namespace App\Component\Post\Port\Rest;

use App\Component\Post\Application\Query\DTO\PostDTO;
use App\Component\Post\Application\Query\DTO\PostHydrator;
use App\Component\Post\Application\Query\GetSinglePostQuery;
use App\Component\Post\Domain\ValueObject\PostId;

class GetSinglePostAction
{
    public function __construct(private GetSinglePostQuery $query, private PostHydrator $postHydrator)
    {
    }

    public function __invoke(string $postId): PostDTO
    {
        $post = $this->query->query(new PostId($postId));
        $postSnapshot = $post->toSnapshot();

        return $this->postHydrator->hydrate(array_merge($postSnapshot, [
            'user_name' => $postSnapshot['user']->name,
            'created_at' => $postSnapshot['createdAt'],
            'updated_at' => $postSnapshot['updatedAt'],
        ]));
    }
}
