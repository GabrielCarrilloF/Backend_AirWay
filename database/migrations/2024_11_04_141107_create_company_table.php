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
         Schema::create('company', function (Blueprint $table) {
            $table->string('name', 255)->primary();
            $table->string('email', 255)->unique()->nullable(); 
            $table->string('phone_number', 255)->unique(); 
            $table->text('address')->nullable(); 
            $table->string('contact_person', 255)->nullable(); 
            $table->uuid('authen_id')->nullable(); 
            $table->uuid('plan_id')->nullable(); 
            $table->timestamps(0);
            
            
            $table->foreign('authen_id')->references('id')->on('authentication')->onDelete('set null');
            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company');
    }
};
