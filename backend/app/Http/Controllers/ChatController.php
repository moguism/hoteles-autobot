<?php

namespace App\Http\Controllers;

use App\AiAgents\RecepcionistAgent;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessageToAI(Request $request)
    {
        $message = $request->message;
        //error_log('Mensaje recibido: ' . $message);

        $response = RecepcionistAgent::for('content')->respond($message);
        //error_log('Respuesta del agente: ' . $response);

        return response()->json([
            'status' => true, 
            'message' => $response
        ]);
    }
}
