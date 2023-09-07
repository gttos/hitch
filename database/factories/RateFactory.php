<?php

namespace Database\Factories;

use App\Models\Card;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tag>
 */
class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'value' => fake()->numberBetween(0,5),
            'card_id' => Card::all()->count() ? Card::all()->random()->id : 0,
            'user_id' => User::all()->count() ? User::all()->random()->id : 0,
        ];
    }
}
