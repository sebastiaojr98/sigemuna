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
        Schema::create('communal_unities', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->bigInteger('neighborhood_id')->unsigned();
            $table->timestamps();


            $table->foreign('neighborhood_id',)->references('id')->on('neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('communal_unities');
    }
};
