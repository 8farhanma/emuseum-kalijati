<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Always run: required for the app to work (safe to re-run).
        $this->call([
            AdminUserSeeder::class,
            ProfileSeeder::class,
            FaqSeeder::class,
        ]);
    }
}
