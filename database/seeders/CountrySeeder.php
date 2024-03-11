<?php

// database/seeders/CountrySeeder.php
namespace Database\Seeders;

use App\Models\Bank;
use App\Models\City;
use App\Models\Country;
use App\Models\Currency;
use App\Models\Language;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::factory(10)->create()->each(function ($country) {
            City::factory(rand(20, 50))->create(['country_id' => $country->id]);
            Bank::factory(rand(20, 50))->create(['country_id' => $country->id]);
        });
    }

    /**
     * Create a country and its related currency and language.
     *
     * @param array $data
     */
}
