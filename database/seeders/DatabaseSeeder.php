<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

         \App\Models\User::create([
            'name' => 'Kakajan',
            'surname' => 'Saparov',
            'number' => '99362615930',
            'email' => 'saparov@gmail.com',
            'password' => bcrypt('123456'),
         ]);
    }
}
