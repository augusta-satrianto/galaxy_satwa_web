<?php

namespace Database\Seeders;

use DateTime;
use Carbon\Carbon;
use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schedule::create([
            'date' => Carbon::now(),
            'category' => 'Vaksinasi',
        ]);

        Schedule::create([
            'date' => Carbon::now()->addDays(5),
            'category' => 'Imunisasi',
        ]);

        Schedule::create([
            'date' => Carbon::now()->subDays(20),
            'category' => 'Vaksinasi',
        ]);

        Schedule::create([
            'date' => Carbon::now()->addDays(3),
            'category' => 'Imunisasi',
            'status' => 'dibatalkan'
        ]);
    }
}
