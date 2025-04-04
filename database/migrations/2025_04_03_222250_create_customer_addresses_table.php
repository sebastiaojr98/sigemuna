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
        Schema::create('customer_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('neighborhood_id');
            $table->string('street')->nullable();
            $table->string('number')->nullable();
            $table->string('reference')->nullable();
            
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_addresses');
    }
};
