<?php

namespace Database\Seeders;

use App\Models\Notification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-28',
            'time' => '09:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 0,
        ]);

        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-27',
            'time' => '08:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 1,
        ]);
        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-27',
            'time' => '09:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 0,
        ]);

        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-15',
            'time' => '08:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 1,
        ]);
        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-16',
            'time' => '09:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 0,
        ]);

        Notification::create([
            'user_id' => 2,
            'date' => '2024-04-15',
            'time' => '08:00:00',
            'title' => 'Ini Judul',
            'description' => 'Ini Deskripsi',
            'is_read' => 1,
        ]);
    }
}
