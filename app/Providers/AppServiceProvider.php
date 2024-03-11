<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Providers\MerchantValidationServiceProvider;

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
        //
        $this->app->register(MerchantValidationServiceProvider::class);
        $this->app->register(ObserverServiceProvider::class);

    }
}
