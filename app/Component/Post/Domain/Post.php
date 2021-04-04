<?php

namespace App\Component\Post\Domain;

use App\Component\Post\Domain\Enum\Status;
use App\Component\Post\Domain\Event\PostPublished;
use App\Component\Post\Domain\Event\PostUnpublished;
use App\Component\Post\Domain\Exception\PostPublishException;
use App\Component\Post\Domain\Exception\PostUnpublishException;
use App\Component\Post\Domain\Exception\TooManyTagsException;
use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostId;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;
use App\Shared\Domain\AggregateRoot;
use App\Shared\Infrastructure\Auth\User;

final class Post extends AggregateRoot
{
    private Status $status;

    public function __construct(
        private PostId $id,
        private PostTitle $postTitle,
        private PostLink $postLink,
        private PostContent $postContent,
        private array $tags,
        private User $user,
    ) {
        $this->checkMaxNumberOfTags($tags);
    }

    public static function create(
        PostId $id,
        PostTitle $postTitle,
        PostLink $postLink,
        PostContent $postContent,
        array $tags,
        User $user,
    ): Post {
        return new self($id, $postTitle, $postLink, $postContent, $tags, $user,);
    }

    public function id(): PostId
    {
        return $this->id;
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
        $this->checkMaxNumberOfTags($tags);

        $this->tags = $tags;
    }

    public function publish(): void
    {
        if ($this->status === Status::PUBLISHED) {
            throw new PostPublishException();
        }

        $this->status = Status::PUBLISHED;

        $this->raise(new PostPublished($this));
    }

    public function unpublish(): void
    {
        if ($this->status === Status::UNPUBLISHED) {
            throw new PostUnpublishException();
        }

        $this->status = Status::UNPUBLISHED;

        $this->raise(new PostUnpublished($this));
    }

    public function toSnapshot(): array
    {
        return get_object_vars($this) ?? [];
    }

    private function checkMaxNumberOfTags(array $tags): void
    {
        if (count($tags) > 6) {
            throw new TooManyTagsException();
        }
    }
}
