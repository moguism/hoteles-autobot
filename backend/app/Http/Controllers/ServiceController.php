<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return response()->json($services);
    }

    public function getServiceById($id)
    {
        $service = Service::with('hotels.hotel', 'hotels.datePrices')->find($id);

        if (!$service) {
            return response()->json(["status" => 404]);
        }

        return response()->json($service);
    }
}
