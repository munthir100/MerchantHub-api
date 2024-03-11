<?php

namespace Database\Factories;

use App\Models\Store;
use App\Models\Language;
use App\Models\StoreLanguage;
use Illuminate\Database\Eloquent\Factories\Factory;

class StoreLanguageFactory extends Factory
{
    protected $model = StoreLanguage::class;

    public function definition()
    {
        return [
            'store_id' => Store::factory(),
            'language_id' => Language::factory(),
        ];
    }
}

