<?php

namespace Database\Seeders;

use App\Models\Bank;
use App\Models\BankAccount;
use App\Models\Brand;
use App\Models\Category;
use App\Models\City;
use App\Models\Store;
use App\Models\Status;
use App\Models\Language;
use App\Models\Merchant;
use App\Models\Product;
use App\Models\StoreTheme;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

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
            $bankAccounts = BankAccount::factory(10)->create([
                'bank_id' => Bank::inRandomOrder()->first()->id,
                'merchant_id' => $merchant->id,
                'holder_name' => $merchant->name,
            ]);
        }
    }
}
