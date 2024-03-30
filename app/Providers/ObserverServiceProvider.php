<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\ShippingMethod;
use App\Observers\ProductObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\ShippingMethodObserver;

class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Product::observe(ProductObserver::class);
        ShippingMethod::observe(ShippingMethodObserver::class);
    }
}
