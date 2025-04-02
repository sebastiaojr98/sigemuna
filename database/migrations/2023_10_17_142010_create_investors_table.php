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
        Schema::create('investors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('investor_type_id');
            $table->string('name', 255);
            //$table->text('description')->nullable();
            $table->string('address', 255);
            $table->string('city', 100);
            //$table->string('state', 50)->nullable();
            $table->string('country', 50);
            $table->string('phone', 20);
            $table->string('email', 100)->nullable();
            $table->string('site', 255)->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');
            $table->foreign('investor_type_id')->references('id')->on('type_investors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investors');
    }
};
