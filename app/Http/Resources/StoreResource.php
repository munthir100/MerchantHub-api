<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'link' => $this->link,
            'description' => $this->description,
            'theme' => new StoreThemeResource($this->whenLoaded('theme')),
            'language' => new LanguageResource($this->whenLoaded('language')),
            'owner' => new MerchantResource($this->whenLoaded('owner')),
            'status' => new StatusResource($this->whenLoaded('status')),
            'city' => new CityResource($this->whenLoaded('city')),
        ];
    }
}
