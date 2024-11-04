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
            $table->id();
            $table->uuid('id')->primary()->default(DB::raw('(uuid())'));
            $table->uuid('id_authen')->nullable(); // Llave foranea a `authentication`
            $table->uuid('plan_id')->nullable(); // Llave foranea a `plan`
            $table->string('name', 255);
            $table->string('email', 255)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('address')->nullable();
            $table->string('contact_person', 255)->nullable();
            $table->date('registered_date')->nullable();

            $table->foreign('id_authen')->references('id')->on('authentication')->onDelete('set null');
            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('set null');
            $table->timestamps();
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
