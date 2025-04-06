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
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
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

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('customer_id')->references('id')->on('customers');
        });

        // Tabela de Multas
        Schema::create('fines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('invoice_id');
            $table->string('reason');
            $table->decimal('fine_amount', 10, 2);
            $table->unsignedBigInteger("user_create_id");
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('user_create_id')->references('id')->on('users');
        });

        // Tabela de Recibos
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('account_receivable_id');
            $table->decimal('amount_paid', 10, 2);
            $table->string('file_path')->nullable();
            $table->unsignedBigInteger('payment_method_id');
            $table->dateTime('payment_date');
            $table->text('description')->nullable();
            $table->unsignedBigInteger("user_create_id");
            $table->timestamps();

            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->foreign('account_receivable_id')->references('id')->on('accounts_receivable');
            $table->foreign('payment_method_id')->references('id')->on('payment_methods');
            $table->foreign('user_create_id')->references('id')->on('users');
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
