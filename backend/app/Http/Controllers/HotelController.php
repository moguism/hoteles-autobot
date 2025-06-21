<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Services\HotelServicesService;

class HotelController extends Controller
{
    protected HotelServicesService $hotelService;
    public function __construct(HotelServicesService $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function index()
    {
        // Con el "." establezco la otra relación que está dentro
        $hotels = $this->hotelService->getAllHotels();
        return response()->json($hotels);
    }

    public function getHotelById($id)
    {
        $hotel = $this->hotelService->getHotelById($id);

        if (!$hotel) {
            return response()->json(["status" => 404]);
        }

        return response()->json($hotel);
    }
}
