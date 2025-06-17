<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelService;

class HotelServiceSeeder extends Seeder
{
    public function run(): void
    {
        HotelService::create([
            "id"=> 1,
            "hotel_id" => 1,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 2,
            "hotel_id" => 2,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 3,
            "hotel_id" => 2,
            "service_id" => 2,
        ]);

        HotelService::create([
            "id"=> 4,
            "hotel_id" => 1,
            "service_id" => 2,
        ]);
    }
}
