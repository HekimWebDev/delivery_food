<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'price' => $this->faker->numberBetween(1, 10000),
            'amount' => rand(0, 10),
            'description' => $this->faker->text(),
            'image' => \Storage::files('images')[rand(0, 5)],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'category_id' => Category::inRandomOrder()->first()->id,
        ];
    }
}
