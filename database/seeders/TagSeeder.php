<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::factory()->create([
            'name' => 'abridor'
        ]);
        Tag::factory()->create([
            'name' => 'ego'
        ]);
        Tag::factory()->create([
            'name' => 'comportamiento'
        ]);
        Tag::factory()->create([
            'name' => 'mente-femenina'
        ]);
//        Tag::factory(10)->create();
    }
}
