<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // Include other fields as needed
            'product' => new ProductResource($this->whenLoaded('product')),
            'order' => new OrderResource($this->whenLoaded('order')),
        ];
    }
}
