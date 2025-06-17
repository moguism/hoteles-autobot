<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DatePrice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function hotelService()
    {
        return $this->belongsTo(HotelService::class, 'hotel_service_id');
    }
}
