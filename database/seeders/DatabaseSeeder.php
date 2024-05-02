<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Seeders\PetSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AppointmentSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(MedicalRecordSeeder::class);
        $this->call(MedicineSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(PetSeeder::class);
        $this->call(UserSeeder::class);
    }
}
