<?php

namespace App\Component\Post\Domain;

use App\Component\Post\Domain\DTO\Post as PostDTO;
use App\Component\Post\Domain\Event\PostCreated;
use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;
use App\Shared\Domain\AggregateRoot;
use App\Shared\Infrastructure\User;

final class Post extends AggregateRoot
{
    public function __construct(
        private PostId $id,
        private PostTitle $postTitle,
        private PostLink $postLink,
        private PostContent $postContent,
        private array $tags = [],
        private User $user,
    ) {
        $this->raise(new PostCreated($this));
    }

    public static function create(
        PostId $id,
        PostTitle $postTitle,
        PostLink $postLink,
        PostContent $postContent,
        array $tags = [],
        User $user,
    ): Post {
        return new self($id, $postTitle, $postLink, $postContent, $tags, $user,);
    }

    public function changeTitle(PostTitle $postTitle): void
    {
        $this->postTitle = $postTitle;
    }

    public function changeLink(PostLink $postLink): void
    {
        $this->postLink = $postLink;
    }

    public function changeContent(PostContent $postContent): void
    {
        $this->postContent = $postContent;
    }

    public function changeTags(array $tags): void
    {
        $this->tags = $tags;
    }
}
