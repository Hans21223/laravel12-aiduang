<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // สร้าง Admin User
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // ตั้งรหัสผ่าน
            'role' => 'admin',
        ]);

        // สร้าง User ธรรมดา
        User::factory(9)->create();

        $this->call([
            NewsSeeder::class,
        ]);
    }
}