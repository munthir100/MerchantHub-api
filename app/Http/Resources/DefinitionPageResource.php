<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DefinitionPageResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'status' => new StatusResource($this->whenLoaded('status')),
        ];
    }
}
