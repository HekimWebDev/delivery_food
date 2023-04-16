<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
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

         Category::factory(3)->create();

         Product::factory(20)->create();
    }
}
