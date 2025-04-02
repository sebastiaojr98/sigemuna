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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("code", 25);
            $table->string("nuit", 9);
            $table->string("first_name");
            $table->string("last_name");
            $table->date("birth");
            $table->bigInteger("gender_id")->unsigned();
            $table->float("height", 5, 2, true);
            $table->bigInteger("marital_status_id")->unsigned();
            $table->bigInteger("nationality_id")->unsigned();
            $table->bigInteger("province_id")->unsigned();
            $table->bigInteger("district_id")->unsigned();
            $table->string("foreign_birthplace")->nullable(); //Naturalidade Estrangeira
            $table->string("father_name");
            $table->string("name_mother");
                                            //Demitido, activo...
            $table->enum("working_status", ["0", "1", "2", "3", "4", "5", "6"]);
            $table->string("picture")->nullable();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();


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
        Schema::dropIfExists('employees');
    }
};
