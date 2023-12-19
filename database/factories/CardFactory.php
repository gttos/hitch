<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->sentence();
        return [
            'id' => fake()->regexify('[A-Za-z0-9]{' . 26 . '}'),
            'tip' => $name,
            'slug' => Str::slug($name),
            'explanation' => fake()->text(),
            'votes_rate' => fake()->numberBetween(1,5),
            'votes_number' => fake()->numberBetween(1,350),
            'user_id' => User::all()->count() ? User::all()->random()->id : 0,
            'category_id' => Category::all()->count() ? Category::all()->random()->id : 0
        ];
    }
}
