<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone_code' => $this->phone_code,
            'phone_digits_number' => $this->phone_digits_number,
            'cities' => CityResource::collection($this->whenLoaded('cities')),
            'currency' => new CurrencyResource($this->whenLoaded('currency')),
            'language' => new LanguageResource($this->whenLoaded('language')),
        ];
    }
}
