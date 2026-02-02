<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceInterface;

use App\Services\Product\ProductCleanupService;
use App\Services\Product\ProductCleanupServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
        AuthServiceInterface::class,
        AuthService::class
    );

        $this->app->bind(
        ProductCleanupServiceInterface::class,
        ProductCleanupService::class
    );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
