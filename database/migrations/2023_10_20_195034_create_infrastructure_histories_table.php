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
        Schema::create('infrastructure_histories', function (Blueprint $table) {
            $table->id();
            $table->date('activity_date');
            $table->time('begin');
            $table->time('end');
            $table->string('responsible_technician');
            $table->text('activities_performed');
            $table->bigInteger("infrastructure_id")->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');

            $table->foreign('infrastructure_id')->references('id')->on('infrastructures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructure_histories');
    }
};
