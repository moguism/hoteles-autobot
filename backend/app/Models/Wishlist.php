<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Wishlist extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relaciones
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hotelService()
    {
        // En teoría su uso sería con $wishlist = "Wishlist::with('hotelService.hotel', 'hotelService.service')->find($id);"
        return $this->belongsTo(HotelService::class, 'hotel_service_id');
    }

}
