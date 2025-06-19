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
            "hotel_id" => 2,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 2,
            "hotel_id" => 3,
            "service_id" => 1,
        ]);

        /*HotelService::create([
            "id"=> 3,
            "hotel_id" => 3,
            "service_id" => 2,
        ]);

        HotelService::create([
            "id"=> 4,
            "hotel_id" => 2,
            "service_id" => 2,
        ]);*/

        HotelService::create([
            "id"=> 3,
            "hotel_id" => 4,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 4,
            "hotel_id" => 5,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 5,
            "hotel_id" => 6,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 6,
            "hotel_id" => 7,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 7,
            "hotel_id" => 8,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 8,
            "hotel_id" => 9,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 9,
            "hotel_id" => 10,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 10,
            "hotel_id" => 11,
            "service_id" => 1,
        ]);

        // El hotel ANY tiene todos los servicios
        HotelService::create([
            "id"=> 11,
            "hotel_id" => 1,
            "service_id" => 1,
        ]);

        HotelService::create([
            "id"=> 12,
            "hotel_id" => 1,
            "service_id" => 2,
        ]);
    }
}
