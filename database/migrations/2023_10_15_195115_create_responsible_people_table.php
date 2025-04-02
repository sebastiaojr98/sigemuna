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
        Schema::create('responsible_people', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->bigInteger("document_type_id")->unsigned();
            $table->string("document_number");
            $table->string("phone");
            $table->string("document");
            $table->bigInteger("client_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('document_type_id')->references('id')->on('document_types');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsible_people');
    }
};
