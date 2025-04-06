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
        Schema::create('licenses', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            
            $table->bigInteger('service_contracted_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();

            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_registration')->nullable();

            $table->integer('house_number')->nullable();
            $table->integer('block')->nullable();
            $table->unsignedBigInteger('communal_unit_id')->nullable();


            $table->date('issue_date')->nullable();
            $table->date('due_date')->nullable();
            $table->enum('status', ['Pendente', 'Emitida', 'Expirada', 'Cancelada'])->default('Pendente');
            
            $table->enum('printed', ['Não', 'Sim'])->default('Não');
            $table->enum('signed', ['Não', 'Sim'])->default('Não');

            $table->timestamps();

            $table->foreign('service_contracted_id',)->references('id')->on('service_contracteds');
            $table->foreign('customer_id',)->references('id')->on('customers');
            $table->foreign('communal_unit_id',)->references('id')->on('communal_unities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licenses');
    }
};
