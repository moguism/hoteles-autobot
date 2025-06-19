<?php

namespace App\Http\Controllers;

use App\Models\HotelService;

class HotelServiceController extends Controller
{
    public function index()
    {
        $hotelServices = HotelService::with(['hotel', 'service', 'datePrices'])->get();
        return response()->json($hotelServices);
    }
}
