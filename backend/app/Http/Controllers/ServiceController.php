<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Services\ServicesService;

class ServiceController extends Controller
{
    protected ServicesService $servicesService;
    public function __construct(ServicesService $servicesService)
    {
        $this->servicesService = $servicesService;
    }

    public function index()
    {
        $services = $this->servicesService->getAllServices();
        return response()->json($services);
    }

    public function getServiceById($id)
    {
        $service = $this->servicesService->getServiceById($id);

        if (!$service) {
            return response()->json(["status" => 404]);
        }

        return response()->json($service);
    }
}
