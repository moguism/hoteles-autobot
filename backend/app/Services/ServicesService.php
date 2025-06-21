<?php

namespace App\Services;

use App\Models\Service;

class ServicesService
{
    public function getAllServices()
    {
        $services = Service::all();
        return $services;
    }

    public function getServiceById($id)
    {
        $service = Service::with(['hotels.hotel' => function($query) {
            $query->where('id', '!=', 1);  // Excluye el hotel con id 1 (es decir, el ANY)
        }, 'hotels.datePrices'])
        ->find($id);

        return $service;
    }
}