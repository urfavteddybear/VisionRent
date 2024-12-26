<?php

namespace Database\Factories;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'category_id' => Category::inRandomOrder()->first()->id ?? null,
            'stock' => $this->faker->numberBetween(5, 20),
            'price' => $this->faker->numberBetween(50000, 500000),
            'penalty_percent' => $this->faker->numberBetween(5, 20),
            'picture' => ["items/" . Str::random(32) . ".png"],
            'description' => $this->faker->sentence,
        ];
    }
}
