<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusNames = [
            'NEW',
            'ACTIVE',
            'NOT_ACTIVE',
            'COMPLETED',
            'CANCELED',
            'DELIVERED',
            'PENDING',
            'BLOCKED',
            'MAINTENANCE',
            'PAID',
        ];

        foreach ($statusNames as $name) {
            Status::create(['name' => $name]);
        };
    }
}
