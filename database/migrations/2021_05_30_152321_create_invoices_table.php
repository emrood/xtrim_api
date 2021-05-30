<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('invoice_number')->unique();
            $table->bigInteger('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->bigInteger('pricing_id')->unsigned();
            $table->foreign('pricing_id')->references('id')->on('pricings');
            $table->double('price')->default(0);
            $table->double('discount_percentage')->default(0);
            $table->double('taxe_percentage')->default(0);
            $table->double('fees')->default(0);
            $table->double('total')->default(0);
            $table->date('paid_date')->nullable();
            $table->date('from_date');
            $table->date('to_date');
            $table->enum('status', ['Pending', 'Paid', 'Unpaid'])->default('Pending');
            $table->string('comment', 400)->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
