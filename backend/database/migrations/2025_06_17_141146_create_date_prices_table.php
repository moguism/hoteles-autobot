<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('date_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->double('price')->nullable();
            $table->date('date');
            $table->unsignedBigInteger('hotel_service_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('date_prices');
    }
};
