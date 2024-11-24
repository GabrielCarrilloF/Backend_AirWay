<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('company_profile_images', function (Blueprint $table) {
             $table->bigIncrements('id');
            $table->string('company_id')->unique();
            $table->string('image_url'); 
            $table->timestamps();

            $table->foreign('company_id')->references('name')->on('company')->onDelete('cascade');
        });

        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_profile_images');
    }
};
