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
        Schema::create('license_orders', function (Blueprint $table) {
            $table->id();

            $table->string('reference');
            //$table->double('amount');
            $table->bigInteger('license_status_id')->unsigned();
            $table->bigInteger('license_id')->unsigned();
            $table->bigInteger('client_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('license_type_id')->unsigned();
            $table->string('township');
            $table->string('car_brand')->nullable();
            $table->string('car_model')->nullable();
            $table->string('car_registration')->nullable();

            $table->integer('house_number')->nullable();
            $table->integer('block')->nullable();

            $table->bigInteger('communal_unit_id')->unsigned()->nullable();


            $table->date('issue_date');
            $table->date('due_date');
            //$table->date('payday')->nullable();

            $table->text('observation')->nullable();

            $table->timestamps();

            $table->foreign('license_status_id',)->references('id')->on('license_statuses');
            $table->foreign('license_id',)->references('id')->on('licenses');
            $table->foreign('client_id',)->references('id')->on('clients');
            $table->foreign('user_id',)->references('id')->on('users');
            $table->foreign('license_type_id',)->references('id')->on('license_types');
            $table->foreign('communal_unit_id',)->references('id')->on('communal_unities');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('license_orders');
    }
};
