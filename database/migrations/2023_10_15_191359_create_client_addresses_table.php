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
        Schema::create('client_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('administrative_post_id')->unsigned();
            $table->bigInteger('neighborhood_id')->unsigned();
            $table->bigInteger('communal_unity_id')->unsigned()->nullable();
            $table->integer("block_number")->nullable();
            $table->integer("house_number")->nullable();
            $table->string("description")->nullable();
            $table->bigInteger("client_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('administrative_post_id',)->references('id')->on('administrative_posts');
            $table->foreign('neighborhood_id',)->references('id')->on('neighborhoods');
            $table->foreign('communal_unity_id',)->references('id')->on('communal_unities');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_addresses');
    }
};
