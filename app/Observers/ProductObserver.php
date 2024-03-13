<?php

namespace App\Observers;

use App\Models\OrderItem;
use App\Models\Product;
use Symfony\Component\HttpKernel\Exception\ConflictHttpException;

class ProductObserver
{
    public function creating(Product $product)
    {
        if (empty($product->sku)) {
            $product->sku = $this->generateUniqueAutoSku();
        }
        if ($product->options) {
            $product->options = json_encode($product->options);
        }
    }

    private function generateUniqueAutoSku()
    {
        $skuBase = 'SKU' . (Product::forAuthMerchantStore()->count() + 1);
        $generatedSku = $skuBase;
        $counter = 1;

        while (Product::where('sku', $generatedSku)->exists()) {
            $generatedSku = $skuBase . '-' . $counter;
            $counter++;
        }

        return $generatedSku;
    }

    public function deleting(Product $product)
    {
        $hasOrders = OrderItem::where('product_id', $product->id)->exists();
        if ($hasOrders) {
            throw new ConflictHttpException('Cannot delete the product because it has associated orders.');
        }
    }
}
