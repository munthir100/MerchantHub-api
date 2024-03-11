<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        $currencyData = [
            ['name' => 'Saudi Arabian Riyal', 'shortcut' => 'SAR'],
            ['name' => 'United Arab Emirates Dirham', 'shortcut' => 'AED'],
            ['name' => 'Qatari Rial', 'shortcut' => 'QAR'],
            ['name' => 'Kuwaiti Dinar', 'shortcut' => 'KWD'],
            ['name' => 'Bahraini Dinar', 'shortcut' => 'BHD'],
            ['name' => 'Omani Rial', 'shortcut' => 'OMR'],
            ['name' => 'United States Dollar', 'shortcut' => 'USD'],
            ['name' => 'Sudanese Pound', 'shortcut' => 'SDG'],
            // Add more currencies as needed
        ];

        foreach ($currencyData as $data) {
            Currency::create($data);
        }
    }
}
