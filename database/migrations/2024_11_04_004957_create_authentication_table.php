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
            $table->uuid('id')->primary();
            $table->string('user_name');
            $table->string('passaword');
            $table->string('suppliers')->nullable();
            $table->date('creation_date')->nullable();
            $table->date('last_access_date')->nullable();
            $table->string('state')->nullable();
            $table->timestamps();
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
