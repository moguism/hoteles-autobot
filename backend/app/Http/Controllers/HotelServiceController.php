<?php

namespace App\Http\Controllers;

use App\Models\HotelService;

class HotelServiceController extends Controller
{
    public function index()
    {
        // Con esta línea obtengo todos con sus relaciones ("all()" no vale, tiene que ser "get()")
        $hotelServices = HotelService::with(['hotel', 'service'])->get();
        return response()->json([
            $hotelServices
        ]);
    }
}
