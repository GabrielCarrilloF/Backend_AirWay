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
        Schema::create('transportation_offers', function (Blueprint $table) {
            $table->bigIncrements('id')->primary();
            $table->string('id_vehicle');
            $table->string('origin');
            $table->string('destination');
            $table->date('departure_date');
            $table->date('arrival_date');
            $table->time('departure_time');
            $table->time('arrival_time');
            $table->decimal('price', 8, 2);
            $table->decimal('previous_price', 8, 2)->nullable();
            $table->string('additional_information')->nullable();
            $table->timestamps();

            $table->foreign('id_vehicle')->references('vehicle_registration')->on('vehicle')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transportation_offers');
    }
};
