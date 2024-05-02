<?php

namespace Database\Seeders;

use App\Models\Attendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attendance::create([
            'user_id' => 4,
            'date' => '2024-03-28',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);

        Attendance::create([
            'user_id' => 4,
            'date' => '2024-03-29',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);
        Attendance::create([
            'user_id' => 4,
            'date' => '2024-04-01',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);

        Attendance::create([
            'user_id' => 4,
            'date' => '2024-04-02',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);

        Attendance::create([
            'user_id' => 4,
            'date' => '2024-04-03',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);

        Attendance::create([
            'user_id' => 4,
            'date' => '2024-04-04',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);

        Attendance::create([
            'user_id' => 4,
            'date' => '2024-04-05',
            'check_in' => '08:00:00',
            'check_out' => '20:00:00',
        ]);
    }
}
