<?php

namespace App\Binders\Merchant;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RouteBinder
{
    /**
     * Bind routes.
     */
    public static function bindRoutes($merchant): void
    {
        self::bindProduct($merchant);
    }


    private static function bindProduct($merchant): void
    {
        Route::bind('product', function ($value) use ($merchant) {
            $product = Product::where('id', $value)
                ->where('store_id', $merchant->store_id)
                ->first();

            return $product;
        });
    }
}
