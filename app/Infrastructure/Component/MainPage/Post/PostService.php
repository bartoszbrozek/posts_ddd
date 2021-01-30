<?php

namespace App\Infrastructure\Component\MainPage\Post;

use App\Core\Port\Component\MainPage\Post\Repository\PostRepositoryInterface;
use App\Core\Port\Component\MainPage\View\PostDTO;
use App\Infrastructure\Component\MainPage\Post\Repository\Eloquent\PostHydrator;
use Illuminate\Support\Facades\Auth;

class PostService
{
    public function __construct(
        private PostRepositoryInterface $postRepositoryInterface,
        private PostHydrator $postHydrator,
    ) {
    }

    public function createPost(string $title, string $content)
    {
        $userId = Auth::user()->getId();
        $post = $this->postHydrator->hydrate([$title, $content, $userId]);

        $this->postRepositoryInterface->add($post);
    }

    public function findById(int $id): ?PostDTO
    {
        return $this->postRepositoryInterface->byId($id);
    }
}
