<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.  ---  Receita Interna
     */
    public function up(): void
    {
        Schema::create('internal_revenues', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->bigInteger('form_payment_id')->unsigned();
            $table->unsignedBigInteger('type_revenue_id');
            $table->unsignedBigInteger('client_id');
            $table->decimal('amount', 12, 2);
            $table->date('expense_date');
            $table->date('payday')->nullable();
            $table->string('process_number');
            $table->text('description')->nullable();
            $table->enum('status', ['0', '1']);
            $table->bigInteger('user_create_id')->unsigned();
            $table->bigInteger('user_pay_id')->unsigned()->nullable();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('form_payment_id',)->references('id')->on('form_payments');
            $table->foreign('user_create_id',)->references('id')->on('users');
            $table->foreign('user_pay_id',)->references('id')->on('users');
            $table->foreign('type_revenue_id')->references('id')->on('type_revenues');
            $table->foreign('client_id')->references('id')->on('clients');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('internal_revenues');
    }
};
