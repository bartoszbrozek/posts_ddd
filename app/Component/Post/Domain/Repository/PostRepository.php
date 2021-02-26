<?php

namespace App\Component\Post\Domain\Repository;

use App\Component\Post\Domain\Post;
use App\Component\Post\Domain\ValueObject\PostId;

interface PostRepository
{
    public function findBy(PostId $postId): Post;

    public function save(Post $post): void;

    public function remove(Post $post): void;
}
