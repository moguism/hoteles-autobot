<?php

namespace App\Http\Controllers;

use App\AiAgents\RecepcionistAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Exception;

class ChatController extends Controller
{
    public function sendMessageToRasa(Request $request)
    {
        $message = $request->message;
        //error_log("Mensaje: " . $message);
        $rasaResponse = $this->sendMessageToRasaApi($message);

        if (!$rasaResponse)
        {
            return null;
        }

        // Si tira excepción significa que Rasa ha respondido falso o directamente no hay respondido (pero si ha procesado, al contrario que en el if anterior)
        try
        {
            $text = $rasaResponse[0]["text"];

            if($text == "false")
            {
                throw new Exception("Rasa no ha dado respuesta");
            }

            $response = [
                "text" => $text,
            ];

            return response()->json($response);
        }
        catch (Exception)
        {
            // También se podría hacer la petición al MCP Server
            return $this->sendMessageToAI($message);
        }
    }

    private function sendMessageToRasaApi(string $message)
    {
        $response = Http::post(env("RASA_WEBHOOK"), [
            'sender' => 'user', // Este es el identificativo, por ahora no me importa mucho
            'message' => $message
        ]);
        error_log("Respuesta de Rasa: " . $response . " Tipo: " . gettype($response));
        return $response;
    }

    private function sendMessageToAI(string $message)
    {
        $response = RecepcionistAgent::for('content')->respond($message);
        //error_log('Respuesta del agente: ' . $response);
        return response()->json([
            'status' => true,
            'message' => $response
        ]);
    }
}
