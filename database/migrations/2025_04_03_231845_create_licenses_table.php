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
            $table->bigInteger('communal_unit_id')->unsigned()->nullable();


            $table->date('issue_date');
            $table->date('due_date');
            $table->enum('status', ['Pendente', 'Activa', 'Expirada', 'Cancelada'])->default('Pendente');

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
