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
         Schema::create('plan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('plan_name')->unique();
            $table->decimal('percentage_fee', 5, 2);  
            $table->text('description');  
            $table->decimal('price', 10, 2);  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan');
    }
};
