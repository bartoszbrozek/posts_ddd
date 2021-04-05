<?php

namespace App\Component\Post\Application\Query;

use App\Component\Post\Domain\Post;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Domain\ValueObject\PostId;

class GetSinglePostQuery
{
    public function __construct(
        private PostRepository $postRepository
    ) {
    }

    public function query(PostId $postId): Post
    {
        return $this->postRepository->findBy($postId);
    }
}
