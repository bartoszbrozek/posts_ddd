<?php

namespace App\Presentation\UI\Web\Frontend\Providers;

use Illuminate\Support\ServiceProvider;
use App\Component\Post\Domain\Repository\PostRepository;
use App\Component\Post\Infrastructure\Db\DbPostRepository;

class PostServiceProvider extends ServiceProvider
{
    public $bindings = [
        PostRepository::class => DbPostRepository::class,
    ];
}
