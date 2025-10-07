<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@sofialearn.com',
            'password' => \Illuminate\Support\Facades\Hash::make('admin123'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        // Create Test Teacher
        User::create([
            'name' => 'Test Teacher',
            'email' => 'teacher@sofialearn.com',
            'password' => \Illuminate\Support\Facades\Hash::make('teacher123'),
            'role' => 'teacher',
            'email_verified_at' => now(),
        ]);

        // Create Test Student
        User::create([
            'name' => 'Test Student',
            'email' => 'student@sofialearn.com',
            'password' => \Illuminate\Support\Facades\Hash::make('student123'),
            'role' => 'student',
            'email_verified_at' => now(),
        ]);
    }
}
