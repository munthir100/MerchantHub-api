<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionPlanResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'status' => new StatusResource($this->whenLoaded('status')),
            'features' => SubscriptionPlanFeatureResource::collection($this->whenLoaded('features')),
        ];
    }
}
