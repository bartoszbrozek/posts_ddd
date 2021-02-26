<?php

namespace App\Component\Post\Application\Command;

use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;

class CreatePost
{
    public function __construct(
        private PostContent $postContent,
        private PostTitle $postTitle,
        private PostLink $postLink,
        private array $tags,
    ) {
    }

    /**
     * Get the value of postContent
     */
    public function getPostContent(): PostContent
    {
        return $this->postContent;
    }

    /**
     * Get the value of postTitle
     */
    public function getPostTitle(): PostTitle
    {
        return $this->postTitle;
    }

    /**
     * Get the value of postLink
     */
    public function getPostLink(): PostLink
    {
        return $this->postLink;
    }

    /**
     * Get the value of tags
     */
    public function getTags(): array
    {
        return $this->tags;
    }
}
