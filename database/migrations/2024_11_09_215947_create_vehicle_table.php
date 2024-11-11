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
        Schema::create('vehicle', function (Blueprint $table) {
            $table->string('vehicle_registration')->primary();
            $table->string('company_id');
            $table->string('vehicle_model');
            $table->string('total_seats');
            $table->string('occupied_seats')->default(0);
            $table->string('amenities')->nullable();
            $table->enum('vehicle_status', ['Disponible', 'Ocupado', 'Mantenimiento', 'Reparación']);
            $table->enum('vehicle_type', ['bus', 'avion']);
            $table->timestamps();

            $table->foreign('company_id')->references('name')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle');
    }
};
