<?php

namespace App\Observers;

use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Auth\Access\AuthorizationException;
use JsonException;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }

    public function deleting(Product $product)
    {
        $hasOrders = OrderItem::where('product_id', $product->id)->exists();
        if ($hasOrders) {
            throw new ConflictHttpException('Cannot delete the product because it has associated orders.');
        }
    }
}
