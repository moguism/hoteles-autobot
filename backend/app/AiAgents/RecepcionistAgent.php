<?php

namespace App\AiAgents;

use App\Models\HotelService;
use LarAgent\Agent;
use LarAgent\Attributes\Tool;

class RecepcionistAgent extends Agent
{
    protected $model = 'gpt-4o-mini';

    protected $history = 'in_memory';

    protected $provider = 'default';

    protected $tools = [];

    // Instrucciones para el funcionamiento del agente
    // El vídeo oficial dice que cualquier prompt para controlar el mensaje se ponga en la función "prompt", pero a mi solo me funciona aquí
    public function instructions()
    {
        return "Eres un experto en viajes: se te va a preguntar cuándo es mejor viajar, consejos sobre costes, etc. Cualquier cuestión que no esté relacionada con viajes o precios de los mismo debe ser contestada con 'No estoy entrenado para esto'";
    }

    public function prompt($message)
    {
        return $message;
    }

    // ESTO ES UN MCP: Una herramienta que le da contexto al modelo de Inteligencia Artificial
    #[Tool('Obtiene todos los hoteles y sus servicios')]
    public function obtainHotelsAndServices()
    {
        // Con esta línea obtengo todos con sus relaciones ("all()" no vale, tiene que ser "get()")
        $hotelServices = HotelService::with(['hotel', 'service'])->get();
        return $hotelServices;
    }
}
