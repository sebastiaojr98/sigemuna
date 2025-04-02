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
        Schema::create('financiers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('financier_type_id')->unsigned();
            $table->string('name', 255);
            $table->text('description')->nullable();
            $table->string('address', 255)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('country', 50)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100)->nullable();
            $table->string('site', 255)->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');
            $table->foreign('financier_type_id')->references('id')->on('financier_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financiers');
    }
};
