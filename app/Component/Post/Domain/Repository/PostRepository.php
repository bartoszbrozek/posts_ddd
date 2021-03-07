<?php

namespace App\Component\Post\Domain\Repository;

use App\Component\Post\Domain\Post;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Infrastructure\PostCollection;

interface PostRepository
{
    public function findAll(): PostCollection;

    public function findBy(PostId $postId): Post;

    public function save(Post $post): void;

    public function remove(Post $post): void;
}
