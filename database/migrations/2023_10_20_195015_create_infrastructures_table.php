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
        Schema::create('infrastructures', function (Blueprint $table) {
            $table->id();
            $table->string("year");
            $table->string("code")->unique();
            $table->enum("status", ["0", "1", "2"]);
            $table->string("image");
            $table->bigInteger("infrastructure_type_id")->unsigned();
            $table->bigInteger("neighborhood_id")->unsigned();
            $table->text("description");
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');

            $table->foreign('infrastructure_type_id')->references('id')->on('infrastructure_types');
            $table->foreign('neighborhood_id')->references('id')->on('neighborhoods');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infrastructures');
    }
};
