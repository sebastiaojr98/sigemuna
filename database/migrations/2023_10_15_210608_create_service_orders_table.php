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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('reference');
            //$table->double('amount');
            $table->enum('status', ['0', '1']);
            $table->bigInteger('neighborhood_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('service_id')->unsigned();
            $table->bigInteger('sub_service_id')->unsigned();
            //$table->date('payday')->nullable();
            

            $table->text('observation')->nullable();

            $table->timestamps();

            $table->foreign('neighborhood_id',)->references('id')->on('neighborhoods');
            $table->foreign('client_id',)->references('id')->on('clients');
            $table->foreign('user_id',)->references('id')->on('users');
            $table->foreign('service_id',)->references('id')->on('services');
            $table->foreign('sub_service_id',)->references('id')->on('sub_services');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};
