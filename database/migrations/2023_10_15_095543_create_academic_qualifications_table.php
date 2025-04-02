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
        Schema::create('academic_qualifications', function (Blueprint $table) {
            $table->id();
            $table->string("academic_level");
            $table->string("conclusion_year");
            $table->string("course");
            $table->bigInteger("country_of_training_id")->unsigned();
            $table->string("educational_institution");
            $table->string("document");
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('country_of_training_id')->references('id')->on('nationalities');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('academic_qualifications');
    }
};
