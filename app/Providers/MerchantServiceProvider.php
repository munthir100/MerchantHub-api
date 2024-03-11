<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Observers\CategoryObserver;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Observers\Merchant\StoreIdObserver;

class MerchantServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        $this->registerRoutes();
    }

    private function registerRoutes(): void
    {
        Route::middleware('api')
            ->prefix('api/merchant')
            ->group(base_path('routes/merchant.php'));
    }
}
