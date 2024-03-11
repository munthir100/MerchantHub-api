<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreThemeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'is_default' => $this->is_default,
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
