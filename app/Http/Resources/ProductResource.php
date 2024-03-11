<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'cost' => $this->cost,
            'sku' => $this->sku,
            'quantity' => $this->quantity,
            'is_unlimited' => $this->is_unlimited,
            'weight' => $this->weight,
            'is_discounted' => $this->is_discounted,
            'price_after_discount' => $this->price_after_discount,
            'shortcut_description' => $this->shortcut_description,
            'description' => $this->description,
            'options' => $this->options,
            'status_id' => $this->status_id,
            'store' => new StoreResource($this->whenLoaded('store')),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'brand' => new BrandResource($this->whenLoaded('brand')),
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
