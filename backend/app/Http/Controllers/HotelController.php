<?php

namespace App\Http\Controllers;

use App\Models\Hotel;

class HotelController extends Controller
{
    public function index()
    {
        $hotel = Hotel::with(['services'])->get();
        return response()->json($hotel);
    }
}
