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
        Schema::create('authentication', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(uuid())'));
            $table->string('user_name', 255)->unique();
            $table->string('passaword', 255)->nullable();
            $table->string('suppliers', 155)->nullable();
            $table->dateTime('creation_date')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('last_access_date')->nullable();
            $table->string('state', 99)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authentication');
    }
};
