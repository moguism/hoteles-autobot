<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        // Con el "." establezco la otra relación que está dentro
        $hotels = Hotel::with('services.service', 'services.datePrices')->get();
        return response()->json($hotels);
    }

    public function getHotelById($id)
    {
        $hotel = Hotel::with('services.service', 'services.datePrices')->find($id);

        if (!$hotel) {
            return response()->json(["status" => 404]);
        }

        return response()->json($hotel);
    }
}
