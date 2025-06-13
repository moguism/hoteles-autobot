<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HotelService extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relaciones
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }   
}
