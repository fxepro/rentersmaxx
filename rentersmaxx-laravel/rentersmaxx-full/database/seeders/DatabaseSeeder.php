<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CountryProcessorSeeder::class,
        ]);
    }
}

class CountryProcessorSeeder extends Seeder
{
    /**
     * Seeds the countries config into DB if you choose to store it there.
     * The app reads from config/countries.php directly in production —
     * this seeder is for reference / admin tooling.
     */
    public function run(): void
    {
        // Countries are read from config/countries.php at runtime.
        // No DB seeding needed — ProcessorFactory::for() uses the config directly.
        // Add a DB-backed countries table only if you need runtime country management.
        $this->command->info('Countries loaded from config/countries.php — no DB seeding needed.');
    }
}
