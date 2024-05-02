<?php

namespace Database\Seeders;

use App\Models\Appointment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Appointment::create([
            'patient_id' => 1,
            'doctor_id' => 4,
            'pet_id' => 1,
            'date' => '2024-05-17',
            'time' => '09:00:00',
            'status' => 'dibuat',
        ]);

        Appointment::create([
            'patient_id' => 1,
            'doctor_id' => 5,
            'pet_id' => 2,
            'date' => '2024-04-18',
            'time' => '09:00:00',
            'status' => 'dibuat',
        ]);
    }
}
