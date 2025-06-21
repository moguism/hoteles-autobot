<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChatRequest;
use App\Services\ChatService;

class ChatController extends Controller
{
    protected ChatService $chatService;
    public function __construct(ChatService $chatService)
    {
        $this->chatService = $chatService;
    }
    
    public function sendMessageToRasa(ChatRequest $request)
    {
        return $this->chatService->sendMessage($request);
    }
}
