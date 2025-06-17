<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Este primer hotel está para poder hacer una wishlist para un servicio de cualquier hotel
        Hotel::create([
            "id"=> 1,
            "name"=> "ANY",
            "address"=> "ANY"
        ]);

        Hotel::create([
            "id"=> 2,
            "name"=> "Hotel Polynesia",
            "address"=> "Benalmádena"
        ]);

        Hotel::create([
            "id"=> 3,
            "name"=> "Hotel Benalma",
            "address"=> "Benalmádena"
        ]);
    }
}
