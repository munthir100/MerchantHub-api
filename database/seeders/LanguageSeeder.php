<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languageNames = [
            'English',
            'Arabic',
        ];

        foreach ($languageNames as $name) {
            Language::create(['name' => $name]);
        }
    }
}
