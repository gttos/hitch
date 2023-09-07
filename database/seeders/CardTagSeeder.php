<?php

namespace Database\Seeders;

use App\Models\Card;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class CardTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::all()->map(fn($card) => $card->tags()->attach(Tag::all()->random(1)));
    }
}
