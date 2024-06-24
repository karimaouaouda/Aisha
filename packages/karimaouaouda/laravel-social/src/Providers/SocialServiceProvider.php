<?php

namespace Karimaouaouda\LaravelSocial\Providers;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //$this->loadRoutesFrom(__DIR__ . '/../../routes/social.php');

        //$this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //dd("dqs");
    }
}
