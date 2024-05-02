<?php

namespace Database\Seeders;

use App\Models\MedicalRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicalRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MedicalRecord::create([
            'doctor_id' => 4,
            'pet_id' => 1,
            'date' => '2024-05-10',
            'symptom' => 'Gejala A',
            'diagnosis' => 'Diagnosa A',
            'action' => 'Terapi A',
            'recipe' => 'Recipe A',
        ]);

        MedicalRecord::create([
            'doctor_id' => 4,
            'pet_id' => 2,
            'date' => '2024-05-11',
            'symptom' => 'Gejala B',
            'diagnosis' => 'Diagnosa A',
            'action' => 'Terapi C',
            'recipe' => 'Recipe A',
        ]);

        MedicalRecord::create([
            'doctor_id' => 5,
            'pet_id' => 1,
            'date' => '2024-05-13',
            'symptom' => 'Gejala C',
            'diagnosis' => 'Diagnosa A',
            'action' => 'Terapi B',
            'recipe' => 'Recipe A',
        ]);
    }
}
