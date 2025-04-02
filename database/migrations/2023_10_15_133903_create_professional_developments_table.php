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
        /*
        'department_id',
        'process_code',
        'position_company_id',
        'category',
        'dispatch_process',
        'dispatch_date',
        'visa_date',
        'begin',
        'finish',
        'document',
        'employee_id',
        'user_create_id'
        */
        Schema::create('professional_developments', function (Blueprint $table) {
            $table->id();
            $table->string("process_code");
            $table->string("category");
            $table->string("dispatch_process");
            $table->date("dispatch_date");
            $table->date("visa_date");
            $table->date("begin");
            $table->date("finish")->nullable();
            $table->string("document");
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('position_company_id')->unsigned();
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('department_id',)->references('id')->on('departments');
            $table->foreign('position_company_id',)->references('id')->on('position_companies');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professional_developments');
    }
};
