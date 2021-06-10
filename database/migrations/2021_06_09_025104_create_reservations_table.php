<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('phone')->nullable();
            $table->string('comment')->nullable();
            $table->date('reservation_date');
            $table->time('from_time');
            $table->time('to_time');
            $table->bigInteger('room_id')->unsigned();
            $table->foreign('room_id')->references('id')->on('rooms');
            $table->bigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoices');
            $table->bigInteger('customer_id')->unsigned()->default(1);
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
