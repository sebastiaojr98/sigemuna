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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string("code");
            $table->bigInteger('account_type_id')->unsigned();
            $table->string('full_name');
            $table->date('birth')->nullable();
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->bigInteger('marital_status_id')->unsigned()->nullable();
            $table->string('nuit')->unique();
            $table->string('phone');
            $table->bigInteger("nationality_id")->unsigned()->nullable();
            $table->bigInteger("province_id")->unsigned()->nullable();
            $table->bigInteger("district_id")->unsigned()->nullable();
            $table->string("foreign_birthplace")->nullable(); //Naturalidade Estrangeira
            $table->string("picture")->nullable();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('account_type_id',)->references('id')->on('account_types');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
