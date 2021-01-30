<?php

namespace App\Core\Port\Component\MainPage\Post\Repository;

use App\Core\Port\Component\MainPage\View\PostDTO;

interface PostRepositoryInterface
{
    public function byId(int $id): ?PostDTO;
    public function add(PostDTO $post): void;
}
