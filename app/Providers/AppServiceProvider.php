<?php

namespace App\Providers;

use App\Service\OAuth;
use App\Service\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        View::addNamespace('layouts');

        $this->app->bind('oauth', function () {
            return new OAuth;
        });

        $this->app->bind('file', function () {
            return new File;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
