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
        Schema::create('personal_contacts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("type_contact_id")->unsigned();
            $table->string("contact");
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('type_contact_id')->references('id')->on('type_contacts');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_contacts');
    }
};
