<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\Brand;
use App\Models\Store;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Merchant;
use App\Models\BankAccount;
use App\Models\City;
use Illuminate\Database\Seeder;
use App\Models\CustomerLocation;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Create 10 merchants
        $merchants = Merchant::factory(10)->create();

        foreach ($merchants as $merchant) {
            $store = Store::factory()->create(['owner_id' => $merchant->id]);
            $categories = Category::factory(3)->create(['store_id' => $store->id]);
            foreach ($categories as $category) {
                $brands = Brand::factory(2)->create([
                    'category_id' => $category->id,
                    'store_id' => $store->id,
                ]);
                foreach ($brands as $brand) {
                    Product::factory(1)->create([
                        'brand_id' => $brand->id,
                        'store_id' => $store->id
                    ]);
                }
                $products = Product::factory(1)->create([
                    'category_id' => $category->id,
                    'store_id' => $store->id
                ]);
                $merchant->update(['store_id' => $store->id]);
            }
            $products = Product::factory(1)->create([
                'store_id' => $store->id
            ]);
            $customers = Customer::factory(10)->create([
                'city_id' => City::whereHas('country', function ($query) use ($store) {
                    $query->where('id', $store->city->country_id);
                })->inRandomOrder()->first()->id,
                'store_id' => $store->id,
            ]);
            $customers->each(function ($customer) {
                $locations = CustomerLocation::factory()
                    ->count(random_int(1, 3))
                    ->make([
                        'city_id' => $customer->city_id,
                    ]);
                $locations->random()->is_default = true;
                $customer->locations()->saveMany($locations);
            });
            $bankAccounts = BankAccount::factory(10)->create([
                'bank_id' => Bank::inRandomOrder()->first()->id,
                'merchant_id' => $merchant->id,
                'holder_name' => $merchant->name,
            ]);
        }
    }
}
