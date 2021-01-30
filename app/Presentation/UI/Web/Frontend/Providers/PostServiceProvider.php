<?php

namespace App\Presentation\UI\Web\Frontend\Providers;

use App\Core\Port\Component\MainPage\Post\Repository\PostRepositoryInterface;
use App\Infrastructure\Component\MainPage\Post\Repository\Eloquent\EloquentPostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    public $bindings = [
        PostRepositoryInterface::class => EloquentPostRepository::class,
    ];
}
