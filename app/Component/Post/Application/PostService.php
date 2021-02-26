<?php

namespace App\Component\Post\Application;

use App\Component\Post\Application\Command\CreatePost;
use App\Component\Post\Domain\Post as PostAggregate;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Shared\Infrastructure\User;

class PostService
{
    public function __construct(
        private PostRepository $postRepository,
    ) {
    }

    public function addPost(CreatePost $command, User $user)
    {
        $postId = PostId::random();
        $postAggregate = new PostAggregate(
            $postId,
            $command->getPostTitle(),
            $command->getPostLink(),
            $command->getPostContent(),
            $command->getTags(),
            $user,
        );
        $this->postRepository->save($postAggregate);
    }

    public function updatePost()
    {
    }

    public function deletePost()
    {
    }
}
