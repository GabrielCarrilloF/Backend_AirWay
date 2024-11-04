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
            $table->uuid('id')->primary();
            $table->uuid('id_authen')->nullable();
            $table->uuid('plan_id')->nullable();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('contact_person')->nullable();
            $table->date('registered_date')->nullable();
            $table->timestamps();

            
            $table->foreign('id_authen')->references('id')->on('authentication')->onDelete('set null');
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
