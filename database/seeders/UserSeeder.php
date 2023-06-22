<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'role' => 'teacher',
            'name' => 'Teacher',
            'email' => 'teacher@mail.com',
            'password' => Hash::make('12345678'),
        ]);

        User::factory()->create([
            'role' => 'student',
            'name' => 'Student',
            'email' => 'student@mail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
