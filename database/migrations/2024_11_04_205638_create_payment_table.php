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
        Schema::create('payment', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('company_id');
            $table->uuid('plan_id');
            $table->date('payment_day')->nullable();
            $table->decimal('amount_paid', 10, 2)->nullable();
            $table->string('payment_status')->nullable();
            $table->string('payment_type')->nullable();
            $table->timestamps();

            
            $table->foreign('company_id')->references('id')->on('company')->onDelete('cascade');
            $table->foreign('plan_id')->references('id')->on('plan')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
