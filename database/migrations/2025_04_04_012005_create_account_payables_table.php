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
        Schema::create('account_payables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('expense_id');
            $table->decimal('amount_due', 10, 2);
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->date('payment_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['Pago', 'Parcial', 'Pendente'])->default('Pendente');
            $table->timestamps();

            $table->foreign('expense_id')->references('id')->on('expenses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_payables');
    }
};
