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
        // Tabela de Faturas
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->string('number')->unique();
            $table->enum('type', ['Serviço', 'Licença', 'Multa']);
            $table->decimal('total_amount', 10, 2);
            $table->date('due_date');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        // Tabela de Contas a Receber
        Schema::create('accounts_receivable', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('customer_id');
            $table->decimal('amount_due', 10, 2);
            $table->decimal('amount_paid', 10, 2)->default(0);
            $table->string("invoice_number");
            $table->enum('status', ['Pendente', 'Parcialmente pago', 'Pago'])->default('Pendente');
            $table->date('due_date');
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });

        // Tabela de Multas
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('reason');
            $table->decimal('fine_amount', 10, 2);
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });

        // Tabela de Recibos
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->decimal('amount_paid', 10, 2);
            $table->unsignedBigInteger('payment_method_id');
            $table->dateTime('payment_date');
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipts');
        Schema::dropIfExists('fines');
        Schema::dropIfExists('accounts_receivable');
        Schema::dropIfExists('invoices');
    }
};
