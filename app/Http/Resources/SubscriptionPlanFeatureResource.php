<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriptionPlanFeatureResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'subscription_plan_id' => $this->subscription_plan_id,
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
