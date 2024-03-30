<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShippingMethodResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'shipping_cost' => $this->shipping_cost,
            'has_cash_on_delivery' => $this->has_cash_on_delivery,
            'cash_on_delivery_cost' => $this->cash_on_delivery_cost,
            'excepted_delivery_time' => $this->excepted_delivery_time,
            'cities_ids' => json_decode($this->cities),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
