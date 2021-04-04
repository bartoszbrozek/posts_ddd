<?php

namespace App\Component\Post\Application;

use App\Component\Post\Application\Command\CreatePost;
use App\Component\Post\Domain\Post as PostAggregate;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Tag\Domain\Tag;
use App\Component\Tag\Domain\ValueObject\TagId;
use App\Component\Tag\Domain\ValueObject\TagValue;
use App\Shared\Domain\DomainEventDispatcherInterface;
use App\Shared\Infrastructure\Auth\User;

class PostService
{
    public function __construct(
        private PostRepository $postRepository,
        private DomainEventDispatcherInterface $dispatcher,
    ) {
    }

    public function addPost(CreatePost $command, User $user)
    {
        $tags = [];

        foreach ($command->getTags() as $tag) {
            $uuid = TagId::random();
            $tags[$uuid->uuid()] = Tag::create($uuid, new TagValue($tag['value']));
        }

        $postId = PostId::random();
        $postAggregate = new PostAggregate(
            $postId,
            $command->getPostTitle(),
            $command->getPostLink(),
            $command->getPostContent(),
            $tags,
            $user,
        );
        $this->postRepository->save($postAggregate);

        foreach ($postAggregate->popEvents() as $event) {
            $this->dispatcher->dispatch($event);
        }
    }

    public function updatePost()
    {
    }

    public function deletePost()
    {
    }
}
