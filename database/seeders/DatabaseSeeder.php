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
        // User::factory(10)->create();

       User::create([
        'name' => 'Administrator',
        'email' => 'admin@gmail.com',
        'password' => bcrypt('password'),
        'user_type' => 'admin',
        'email_verified_at' => now(),
       ]);

       User::create([
        'name' => 'client',
        'email' => 'client@gmail.com',
        'password' => bcrypt('password'),
        'user_type' => 'client',
        'email_verified_at' => now(),
       ]);
    }
}