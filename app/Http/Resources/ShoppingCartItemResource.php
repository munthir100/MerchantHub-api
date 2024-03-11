<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShoppingCartItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product' => new ProductResource($this->whenLoaded('product')),
            'shopping_cart' => new ShoppingCartResource($this->whenLoaded('shoppingCart')),
            'quantity' => $this->quantity,
            'options' => $this->options,
        ];
    }
}
