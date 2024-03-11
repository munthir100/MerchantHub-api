<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\StoreTheme;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StoreThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StoreTheme::factory()->isDefault()->create(['status_id' => Status::where('name', 'ACTIVE')->first()->id]);
        StoreTheme::factory(9)->create(['status_id' => Status::where('name', 'ACTIVE')->first()->id]);
    }
}
