<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MerchantResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => new CountryResource($this->whenLoaded('country')),
            'store' => new StoreResource($this->whenLoaded('store')),
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
