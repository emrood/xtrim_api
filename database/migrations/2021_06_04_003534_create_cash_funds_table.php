<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCashFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cash_funds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('rate_id')->unsigned()->default(1);
            $table->foreign('rate_id')->references('id')->on('rates');
            $table->double('amount')->default(0);
            $table->double('balance')->default(0);
            $table->string('comment')->nullabe();
            $table->enum('type', ['Retrait', 'Depot'])->default('Retrait');
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
        Schema::dropIfExists('cash_funds');
    }
}
