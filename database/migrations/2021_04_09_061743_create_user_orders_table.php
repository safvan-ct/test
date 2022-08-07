<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('product')->nullable();
            $table->string('payment_id')->nullable();
            $table->text('pay_amount')->nullable();
            $table->string('date')->nullable();
            $table->string('ptprice')->nullable();
            $table->string('send')->nullable();
            $table->string('pid')->nullable();
            $table->string('pquantity')->nullable();
            $table->string('orderid')->nullable();
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
        Schema::dropIfExists('user_orders');
    }
}
