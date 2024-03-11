<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'product' => new ProductResource($this->whenLoaded('product')),
            'customer' => new CustomerResource($this->whenLoaded('customer')),
        ];
    }
}
