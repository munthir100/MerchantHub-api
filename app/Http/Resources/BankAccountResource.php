<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'bank_id' => $this->bank_id,
            'merchant_id' => $this->merchant_id,
            'holder_name' => $this->holder_name,
            'details' => $this->details,
            'iban' => $this->iban,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
