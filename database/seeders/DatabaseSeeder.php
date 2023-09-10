<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()
            ->count(5)
            ->sequence(fn($seq) => ['email' => 'user' . $seq->index . '@email.com'])
            ->create();

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            TagSeeder::class,
            PostTagSeeder::class
        ]);
    }
}
