<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceSettingResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'invoice' => new InvoiceResource($this->whenLoaded('invoice')),
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}
