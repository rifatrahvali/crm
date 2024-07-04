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

        $this->app->singleton('view', function ($app) {
            

            return new \Illuminate\View\Factory(
                $app['view.engine.resolver'],
                $app['view.finder'],
                $app['events'],
                
            );
        });
        
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
