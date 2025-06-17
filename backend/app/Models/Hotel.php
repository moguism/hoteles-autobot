<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    use HasFactory;

    protected $guarded = [];

    // Relaciones
    public function services(): HasMany
    {
        return $this->hasMany(HotelService::class);
    }
}
