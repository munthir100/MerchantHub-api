<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SocialLinkResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'facebook' => $this->facebook,
            'instagram' => $this->instagram,
            'twitter' => $this->twitter,
            'whatsapp' => $this->whatsapp,
            'snapchat' => $this->snapchat,
            'x_platform' => $this->x_platform,
            'telegram' => $this->telegram,
            'google_play' => $this->google_play,
            'app_store' => $this->app_store,
            'store' => new StoreResource($this->whenLoaded('store')),
        ];
    }
}

