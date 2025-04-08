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
        Schema::create('supplier_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_payable_id');
            $table->decimal('amount_paid', 10, 2);
            $table->date('payment_date');
            $table->unsignedBigInteger('payment_method_id');
            $table->string('reference')->nullable();
            $table->string('invoice_number', 100)->nullable();
            $table->text('note')->nullable();
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('user_create_id');
            $table->timestamps();

            $table->foreign('account_payable_id')->references('id')->on('account_payables');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('user_create_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('supplier_payments');
    }
};
