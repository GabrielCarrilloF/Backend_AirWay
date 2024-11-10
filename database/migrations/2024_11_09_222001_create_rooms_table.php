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
        Schema::create('rooms', function (Blueprint $table) {
            $table->bigIncrements('id');  
            $table->string('room_number');
            $table->string('company_id');
            $table->string('room_type');
            $table->string('room_size');
            $table->string('room_capacity');
            $table->string('amenities')->nullable();
            $table->string('photos')->nullable();
            $table->enum('room_status', ['Disponible', 'Ocupado', 'Mantenimiento', 'Reparación']);
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('company_id')->references('name')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
