<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\Store;
use App\Models\Status;
use App\Models\Language;
use App\Models\Merchant;
use App\Models\StoreTheme;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreFactory extends Factory
{
    protected $model = Store::class;

    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'link' => $this->faker->unique()->slug,
            'description' => $this->faker->paragraph,
            'city_id' => City::factory(),
            'theme_id' => StoreTheme::factory(),
            'language_id' => Language::factory(),
            'owner_id' => Merchant::whereNull('store_id')->first()->id,
            'status_id' => Status::ACTIVE,
        ];
    }
}
