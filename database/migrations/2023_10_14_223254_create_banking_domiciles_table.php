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
        Schema::create('banking_domiciles', function (Blueprint $table) {
            $table->id();
            $table->string("account_number");
            $table->string("card_number")->nullable();
            $table->string("nib");
            $table->string("validity")->nullable();
            $table->bigInteger("bank_card_issue_id")->unsigned();
            $table->bigInteger("employee_id")->unsigned();
            $table->bigInteger("user_create_id")->unsigned();
            $table->timestamps();

            $table->foreign('bank_card_issue_id')->references('id')->on('bank_card_issuers');
            $table->foreign('employee_id')->references('id')->on('employees');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banking_domiciles');
    }
};
