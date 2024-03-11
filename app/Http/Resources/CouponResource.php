<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'promocode' => $this->promocode,
            'discount_type' => $this->discount_type,
            'value' => $this->value,
            'end_date' => $this->end_date,
            'is_except_discounted_products' => $this->is_except_discounted_products,
            'less_products_number' => $this->less_products_number,
            'max_usage_times' => $this->max_usage_times,
            'max_usage_per_customer' => $this->max_usage_per_customer,
            'status' => new StatusResource($this->whenLoaded('status')),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
