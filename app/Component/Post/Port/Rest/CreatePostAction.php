<?php

namespace App\Component\Post\Port\Rest;

use App\Component\Post\Application\Command\CreatePost;
use App\Component\Post\Application\PostService;
use App\Component\Post\Domain\ValueObject\PostContent;
use App\Component\Post\Domain\ValueObject\PostLink;
use App\Component\Post\Domain\ValueObject\PostTitle;
use App\Shared\Infrastructure\Auth\User;
use Symfony\Component\HttpFoundation\Request;

class CreatePostAction
{
    public function __construct(
        private PostService $service,
    ) {
    }

    public function __invoke(Request $request, User $user)
    {
        $command = new CreatePost(
            new PostContent($request->get('content')),
            new PostTitle($request->get('title')),
            new PostLink($request->get('link')),
            $request->get('tags'),
        );

        $this->service->addPost($command, $user);
    }
}
