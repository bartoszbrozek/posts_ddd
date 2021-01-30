<?php

namespace App\Infrastructure\Component\MainPage\Post\Repository\Eloquent;

use App\Core\Port\Component\MainPage\Post\Repository\PostRepositoryInterface;
use App\Core\Port\Component\MainPage\View\PostDTO;
use Illuminate\Support\Facades\DB;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function __construct(
        private DB $db,
        private PostHydrator $postHydrator,
    ) {
    }

    public function byId(int $id): ?PostDTO
    {
        $user = (array) $this->db::selectOne("SELECT * FROM posts WHERE id = :id", ['id' => $id]);
        return $this->postHydrator->hydrate($user);
    }

    public function add(PostDTO $post): void
    {
    }
}
