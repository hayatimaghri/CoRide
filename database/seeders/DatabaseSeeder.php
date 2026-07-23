<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            EntrepriseSeeder::class,
            UserSeeder::class,
            TrajetSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}