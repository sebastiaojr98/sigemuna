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
        Schema::create('employee_occurrences', function (Blueprint $table) {
            $table->id();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            $table->text('description');
                                    //1 Andamento, 2 Concluida
            $table->enum("status", ["1", "2"]);
            $table->unsignedBigInteger('employee_id');
            $table->string("document")->nullable();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            // Definindo a chave estrangeira
            $table->foreign('user_id',)->references('id')->on('users');
            
            $table->foreign('employee_id')->references('id')->on('employees'); // Certifique-se de ajustar para o nome real da tabela de funcionários
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_occurrences');
    }
};
