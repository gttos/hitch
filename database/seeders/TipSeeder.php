<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tip::factory()->create([
            'name' => 'dia'
        ]);
        Tip::factory()->create([
            'name' => 'noche'
        ]);
        Tip::factory()->create([
            'name' => 'apps'
        ]);
//        Tip::factory(10)->create();
    }
}
