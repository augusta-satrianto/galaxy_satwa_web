<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'date_of_birth' => '2002-11-15',
            'gender' => 'Perempuan',
            'address' => 'Wiyung',
            'phone' => '087654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Devi Cantika',
            'email' => 'devi@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'date_of_birth' => '2002-11-15',
            'gender' => 'Perempuan',
            'address' => 'Wiyung',
            'phone' => '087654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Augusta Satrianto',
            'email' => 'aan@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'date_of_birth' => '2002-08-15',
            'gender' => 'Laki-laki',
            'address' => 'Ketintang',
            'phone' => '085654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Kembang',
            'email' => 'kembang@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'pasien',
            'date_of_birth' => '2002-08-15',
            'gender' => 'Perempuan',
            'address' => 'Lidah Wetan',
            'phone' => '085654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Dr. Sehun',
            'email' => 'sehun@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dokter',
            'specialization' => 'Dokter Umum Hewan',
            'date_of_birth' => '2000-08-15',
            'gender' => 'Laki-laki',
            'address' => 'Sidoarjo',
            'phone' => '088654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Dr. Jimin',
            'email' => 'jimin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dokter',
            'specialization' => 'Dokter Bedah Hewan',
            'date_of_birth' => '2000-08-15',
            'gender' => 'Laki-laki',
            'address' => 'Jakarta',
            'phone' => '088654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Dr. Suga',
            'email' => 'suga@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'dokter',
            'specialization' => 'Dokter Saraf Hewan',
            'date_of_birth' => '2000-08-15',
            'gender' => 'Laki-laki',
            'address' => 'Jakarta',
            'phone' => '088654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Lisa',
            'email' => 'lisa@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'paramedis',
            'date_of_birth' => '2000-08-15',
            'gender' => 'Perempuan',
            'address' => 'Jombang',
            'phone' => '081654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);

        User::create([
            'name' => 'Anya',
            'email' => 'anya@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'paramedis',
            'date_of_birth' => '2000-08-15',
            'gender' => 'Perempuan',
            'address' => 'Jombang',
            'phone' => '081654367531',
            'image' => 'http://192.168.255.214:8000/storage/foto/img_profile.png',
            'email_verified_at' => '2024-01-10',
        ]);
    }
}
