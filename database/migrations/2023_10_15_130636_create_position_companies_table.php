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
        Schema::create('position_companies', function (Blueprint $table) {
            $table->id();
            $table->string('label');
            $table->bigInteger('department_id')->unsigned();
            $table->timestamps();

            $table->foreign('department_id',)->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('position_companies');
    }
};
