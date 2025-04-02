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
        Schema::create('infrastructure_history_files', function (Blueprint $table) {
            $table->id();
            $table->string("path");
            $table->bigInteger("infrastructure_history_id")->unsigned();
            $table->timestamps();

            $table->foreign('infrastructure_history_id')->references('id')->on('infrastructure_histories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure_history_files');
    }
};
