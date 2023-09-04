<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'dia'
        ]);
        Category::factory()->create([
            'name' => 'noche'
        ]);
        Category::factory()->create([
            'name' => 'apps'
        ]);
    }
}
