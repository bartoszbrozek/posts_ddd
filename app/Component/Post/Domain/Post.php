<?php

namespace App\Component\Post\Domain;

use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Tag\Domain\Tag;
use App\Shared\Domain\AggregateRoot;
use App\Shared\Infrastructure\User;

final class Post extends AggregateRoot
{
    public function __construct(
        private PostId $id,
        private PostLink $postLink,
        private PostContent $postContent,
        private User $user,
        private array $tags = [],
    ) {
    }

    public static function create(
        PostId $id,
        PostLink $postLink,
        PostContent $postContent,
        User $user,
        array $tags = [],
    ): Post {
        return new self($id, $postLink, $postContent, $user, $tags);
    }

    public function updatePostLink(PostLink $postLink): void
    {
        $this->postLink = $postLink;
    }

    public function updateContent(PostContent $postContent): void
    {
        $this->postContent = $postContent;
    }

    public function addTag(Tag $tag): void
    {
        $this->tags[$tag->id()] = $tag;
    }
}
