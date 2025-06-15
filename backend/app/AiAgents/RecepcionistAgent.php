<?php

namespace App\AiAgents;

use LarAgent\Agent;

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
}
