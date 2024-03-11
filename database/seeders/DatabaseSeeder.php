<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StatusSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CurrencySeeder::class);
        $this->call(SubscriptionPlanSeeder::class);
        $this->call(StoreThemeSeeder::class);
        $this->call(MerchantSeeder::class);
    }
}
