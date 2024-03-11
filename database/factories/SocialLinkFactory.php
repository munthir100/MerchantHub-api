<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\SocialLink;
use Illuminate\Database\Eloquent\Factories\Factory;

class SocialLinkFactory extends Factory
{
    protected $model = SocialLink::class;

    public function definition()
    {
        return [
            'facebook' => $this->faker->url,
            'instagram' => $this->faker->url,
            'twitter' => $this->faker->url,
            'tiktok' => $this->faker->url,
            'whatsapp' => $this->faker->phoneNumber,
            'snapchat' => $this->faker->url,
            'x_platform' => $this->faker->url,
            'telegram' => $this->faker->url,
            'google_play' => $this->faker->url,
            'app_store' => $this->faker->url,
            'store_id' => Store::factory(),
        ];
    }
}
