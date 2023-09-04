<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
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
            'title' => fake()->sentence(),
            'content' => fake()->text(),
            'user_id' => User::all()->count() ? User::all()->random()->id : 0,
            'category_id' => Category::all()->count() ? Category::all()->random()->id : 0
        ];
    }
}
