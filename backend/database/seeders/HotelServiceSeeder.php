<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HotelService;
use Carbon\Carbon;

class HotelServiceSeeder extends Seeder
{
    public function run(): void
    {
        HotelService::create([
            "id"=> 1,
            "hotel_id" => 1,
            "service_id" => 1,
            "price" => 10,
            "date" => Carbon::now() // La fecha actual
        ]);

        HotelService::create([
            "id"=> 2,
            "hotel_id" => 2,
            "service_id" => 1,
            "price" => 20,
            "date" => Carbon::now()
        ]);

        HotelService::create([
            "id"=> 3,
            "hotel_id" => 2,
            "service_id" => 2,
            "price" => 15,
            "date" => Carbon::now()
        ]);

        HotelService::create([
            "id"=> 4,
            "hotel_id" => 1,
            "service_id" => 2,
            "price" => 30,
            "date" => Carbon::now()
        ]);
    }
}
