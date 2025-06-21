<?php

namespace App\Services;

use App\Models\Hotel;

class HotelServicesService
{
    public function getAllHotels()
    {
        $hotels = Hotel::with('services.service', 'services.datePrices')->where('id', '!=', 1)->get();
        return $hotels;
    }

    public function getHotelById($id)
    {
        if($id == 1)
        {
            return null;
        }
        
        $hotel = Hotel::with('services.service', 'services.datePrices')->find($id);
        return $hotel;
    }
}