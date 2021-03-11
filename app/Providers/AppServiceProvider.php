<?php

namespace App\Providers;

use App\Repositories\TweetRepository;
use App\Repositories\TweetRepositoryApi;
use App\Services\TestService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\TweetRepositoryInterface;
use App\Repositories\TweetRepositoryCache;

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
