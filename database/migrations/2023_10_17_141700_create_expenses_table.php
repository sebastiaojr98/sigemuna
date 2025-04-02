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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            $table->unsignedBigInteger('type_expense_id');
            $table->decimal('amount', 12, 2);
            $table->date('expense_date');
            $table->text('description')->nullable();
            $table->text('document')->nullable();
            $table->bigInteger('user_create_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_create_id',)->references('id')->on('users');
            $table->foreign('type_expense_id')->references('id')->on('type_expenses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
