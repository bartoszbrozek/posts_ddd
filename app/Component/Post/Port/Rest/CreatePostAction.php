<?php

namespace App\Component\Post\Port\Rest;

use App\Component\Post\Application\Command\CreatePost;
use App\Component\Post\Application\PostService;
use App\Shared\Infrastructure\User;
use Symfony\Component\HttpFoundation\Request;

class CreatePostAction
{
    public function __construct(
        private PostService $service,
    ) {
    }

    public function __invoke(Request $request, User $user)
    {
        dd ($request->toArray());
        $command = new CreatePost(
            $request->get('content'),
            $request->get('title'),
            $request->get('link'),
            $request->get('tags'),
        );

        $this->service->addPost($command, $user);
    }
}
