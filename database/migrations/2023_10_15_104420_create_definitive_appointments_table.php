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
        Schema::create('definitive_appointments', function (Blueprint $table) {
            $table->id();
            $table->string("process_code");
            $table->string("dispatch");
            $table->date("dispatch_date");
            $table->date("visa_date");
            $table->string("document");
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();
            
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('definitive_appointments');
    }
};
