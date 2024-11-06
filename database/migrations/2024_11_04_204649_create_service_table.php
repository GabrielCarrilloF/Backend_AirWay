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
         Schema::create('service', function (Blueprint $table) {
          $table->uuid('id')->primary();  
            $table->string('company_id');  
            $table->string('service_type');  
            $table->string('title');  
            $table->text('description')->nullable();  
            $table->timestamps(0);  

            
            $table->foreign('company_id')->references('name')->on('company')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service');
    }
};
