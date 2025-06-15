<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            "id"=> 1,
            "name"=> "Alojamiento",
        ]);

        Service::create([
            "id"=> 2,
            "name"=> "Day pass",
        ]);
    }
}
