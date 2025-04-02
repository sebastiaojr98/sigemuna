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
        Schema::create('households', function (Blueprint $table) {
            $table->id();
            $table->string("full_name");
            $table->bigInteger("degree_of_kinship_id")->unsigned();
            $table->date("birth");
            $table->string("profession")->nullable();
            $table->string("workplace")->nullable();
            $table->string("document");
            $table->bigInteger("gender_id")->unsigned();
            $table->bigInteger("marital_status_id")->unsigned();
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('degree_of_kinship_id')->references('id')->on('degree_of_kinships');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('marital_status_id')->references('id')->on('marital_statuses');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('households');
    }
};
