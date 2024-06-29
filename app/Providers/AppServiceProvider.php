<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// pagination için bootstrap kütüphanesini uyguladık.
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // pagination için bootstrap kütüphanesini uyguladık.
        Paginator::useBootstrap();
    }
}
