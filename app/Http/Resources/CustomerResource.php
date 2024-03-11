<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birth_date' => $this->birth_date,
            'city' => new CityResource($this->whenLoaded('city')),
            'gender' => $this->gender,
            'description' => $this->description,
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
