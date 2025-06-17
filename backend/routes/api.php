<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HotelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // Con este middleware es como obligo a que las rutas estén protegidas

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verify', [AuthController::class, 'verifyAccount']);

Route::post('/chat', [ChatController::class,'sendMessageToRasa']);

Route::get('/hotels', [HotelController::class, 'index']);