<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'code' => '0001',
            'name' => 'Antibiotik',
            'stock' => 10,
            'expiry_date' => '2025-10-10',
        ]);

        Medicine::create([
            'code' => '0001',
            'name' => 'Antibiotik',
            'stock' => 20,
            'expiry_date' => '2024-10-10',
        ]);

        Medicine::create([
            'code' => '0002',
            'name' => 'Paracetamol',
            'stock' => 10,
            'expiry_date' => '2025-10-10',
        ]);

        Medicine::create([
            'code' => '0002',
            'name' => 'Paracetamol',
            'stock' => 20,
            'expiry_date' => '2024-10-10',
        ]);
    }
}
