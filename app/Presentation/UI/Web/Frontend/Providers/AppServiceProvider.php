<?php

namespace App\Presentation\UI\Web\Frontend\Providers;

use App\Shared\Domain\DomainEventDispatcherInterface;
use App\Shared\Infrastructure\Db\DbConnection;
use App\Shared\Infrastructure\Db\Eloquent;
use App\Shared\Infrastructure\Event\LaravelDispatcher;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->when(Eloquent::class)->needs('$app')->give(app());
        $this->app->bind(DbConnection::class, Eloquent::class);
        $this->app->bind(DomainEventDispatcherInterface::class, LaravelDispatcher::class);
    }
}
