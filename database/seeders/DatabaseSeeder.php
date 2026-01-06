<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk hashing

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Menggunakan updateOrCreate agar data tidak duplikat jika seeder dijalankan ulang
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'], // Cek berdasarkan email
            [
                'name' => 'Admin',
                'password' => Hash::make('password123'), // WAJIB DI-HASH
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'volunteer@gmail.com'],
            [
                'name' => 'Volunteer',
                'password' => Hash::make('password123'), // WAJIB DI-HASH
                'role' => 'volunteer',
            ]
        );
    }
}
