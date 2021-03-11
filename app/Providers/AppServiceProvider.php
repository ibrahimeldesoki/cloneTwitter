<?php

namespace App\Providers;

use App\Repositories\TweetRepositoryApi;
use App\Repositories\TweetRepositoryCache;
use App\Repositories\TweetRepositoryInterface;
use App\Services\TestService;
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
        $this->app->bind(TweetRepositoryInterface::class, TweetRepositoryCache::class);
        $this->app->when(TestService::class)->needs(TweetRepositoryInterface::class)->give(TweetRepositoryApi::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
    }
}
