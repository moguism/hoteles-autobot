<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */

    // Ejecutar los seeds con "php artisan db:seed"
    public function run(): void
    {
        $this->call([
            HotelSeeder::class,
            ServiceSeeder::class,
            HotelServiceSeeder::class,
        ]);
    }
}
