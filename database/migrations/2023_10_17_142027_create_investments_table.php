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
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->string('process_number');
            $table->unsignedBigInteger('investor_id'); // Alteração do nome do campo
            $table->decimal('amount', 12, 2);
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('return_rate', 5, 2);
            //$table->enum('status', ['Ativo', 'Concluído', 'Cancelado']);
            $table->enum('status', ['1', '2', '0']);
            $table->string('document');
            $table->text('description')->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');
            $table->foreign('investor_id')->references('id')->on('investors'); // Alteração da referência da chave estrangeira
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
