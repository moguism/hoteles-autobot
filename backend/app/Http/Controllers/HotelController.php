<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        // Con el "." establezco la otra relación que está dentro
        $hotels = Hotel::with('services.service', 'services.datePrices')->where('id', '!=', 1)->get();
        return response()->json($hotels);
    }

    public function getHotelById($id)
    {
        if($id == 1)
        {
            return null;
        }
        
        $hotel = Hotel::with('services.service', 'services.datePrices')->find($id);

        if (!$hotel) {
            return response()->json(["status" => 404]);
        }

        return response()->json($hotel);
    }
}
