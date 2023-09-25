<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => fake()->regexify('[A-Za-z0-9]{' . 26 . '}'),
            'tip' => fake()->sentence(),
            'explanation' => fake()->text(),
            'votes_rate' => fake()->numberBetween(1,5),
            'votes_number' => fake()->numberBetween(1,350),
            'user_id' => User::all()->count() ? User::all()->random()->id : 0,
            'category_id' => Category::all()->count() ? Category::all()->random()->id : 0
        ];
    }
}
