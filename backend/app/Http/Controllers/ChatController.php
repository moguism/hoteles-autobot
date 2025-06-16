<?php

namespace App\Http\Controllers;

use App\AiAgents\RecepcionistAgent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessageToRasa(Request $request)
    {
        // Por ahora Rasa a todo lo que no sabe responde con un mensaje vacío
        // Si es el caso, lo suyo sería que se ejecute el sendMessageToAi
        // También puede hacer la petición al MCP Server
    }

    private function sendMessageToAI(string $message)
    {
        //error_log('Mensaje recibido: ' . $message);

        $response = RecepcionistAgent::for('content')->respond($message);
        //error_log('Respuesta del agente: ' . $response);

        return response()->json([
            'status' => true, 
            'message' => $response
        ]);
    }
}
