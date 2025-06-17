<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'index'])->middleware('auth:sanctum'); // Con este middleware es como obligo a que las rutas estén protegidas

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/verify', [AuthController::class, 'verifyAccount']);

Route::post('/chat', [ChatController::class,'sendMessageToRasa']);

Route::get('/hotels', [HotelController::class, 'index']);
Route::get('/hotels/{id}', [HotelController::class, 'getHotelById']);

Route::get('/services', [ServiceController::class,'index']);
Route::get('/services/{id}', [ServiceController::class, 'getServiceById']);

Route::post('/wishlist/create', [WishlistController::class,'createWishlist'])->middleware('auth:sanctum');
Route::delete('/wishlist/{id}', [WishlistController::class,'deleteWishlistById'])->middleware('auth:sanctum');
