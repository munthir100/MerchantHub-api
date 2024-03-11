<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'customer' => new CustomerResource($this->whenLoaded('customer')),
            'shipping_method' => new ShippingMethodResource($this->whenLoaded('shippingMethod')),
            'coupon' => new CouponResource($this->whenLoaded('coupon')),
            'note' => $this->note,
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
