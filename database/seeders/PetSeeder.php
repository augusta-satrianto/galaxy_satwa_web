<?php

namespace Database\Seeders;

use App\Models\Pet;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pet::create([
            'user_id' => 1,
            'name' => 'Coco Melon',
            'category' => 'Kucing',
            'type' => 'Kucing Anggora',
            'old' => '1 Tahun',
            'gender' => 'Betina',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);

        Pet::create([
            'user_id' => 1,
            'name' => 'Dexter',
            'category' => 'Anjing',
            'type' => 'Himalaya',
            'old' => '1 Tahun',
            'gender' => 'Jantan',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);

        Pet::create([
            'user_id' => 2,
            'name' => 'Pink Fong',
            'category' => 'Kucing',
            'type' => 'Kucing Anggora',
            'old' => '1 Tahun',
            'gender' => 'Betina',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);

        Pet::create([
            'user_id' => 2,
            'name' => 'Nana',
            'category' => 'Anjing',
            'type' => 'Himalaya',
            'old' => '1 Tahun',
            'gender' => 'Jantan',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);

        Pet::create([
            'user_id' => 3,
            'name' => 'Glow',
            'category' => 'Kucing',
            'type' => 'Kucing Anggora',
            'old' => '1 Tahun',
            'gender' => 'Betina',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);

        Pet::create([
            'user_id' => 3,
            'name' => 'Digi',
            'category' => 'Anjing',
            'type' => 'Himalaya',
            'old' => '1 Tahun',
            'gender' => 'Jantan',
            'color' => 'Putih',
            'tatto' => '-',
            'image' => 'http://192.168.194.214:8000/storage/pet/default.png'
        ]);
    }
}
