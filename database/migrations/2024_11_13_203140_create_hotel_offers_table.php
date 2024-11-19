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
        Schema::create('hotel_offers', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('company_id', 255); 
            $table->string('room_id');     
            $table->decimal('price_per_night', 8, 2);  
            $table->date('available_from');            
            $table->date('available_until');           
            $table->timestamps();
            
            $table->foreign('company_id')->references('name')->on('company')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_offers');
    }
};
