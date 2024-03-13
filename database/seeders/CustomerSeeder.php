<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use App\Models\CustomerLocation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()->count(10)->create()->each(function ($customer) {
            $locations = CustomerLocation::factory()->count(random_int(1, 3))->make([
                'customer_id' => $customer->id,
                'city_id' => $customer->city_id,
            ]);

            // Set one location as default
            $locations->random()->is_default = true;

            // Save the locations to the database
            $customer->locations()->saveMany($locations);
        });
    }
}
