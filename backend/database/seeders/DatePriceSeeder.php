<?php

namespace Database\Seeders;

use App\Models\DatePrice;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DatePrice::create([
            "hotel_service_id" => 1,
            "price" => 10,
            "date" => Carbon::now() // La fecha actual
        ]);

        DatePrice::create([
            "hotel_service_id" => 2,
            "price" => 20,
            "date" => Carbon::now()
        ]);

        DatePrice::create([
            "hotel_service_id" => 3,
            "price" => 15,
            "date" => Carbon::now()
        ]);

        DatePrice::create([
            "hotel_service_id" => 4,
            "price" => 30,
            "date" => Carbon::now()
        ]);
    }
}
