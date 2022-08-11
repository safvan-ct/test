<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('product_id')->nullable();
            $table->longText('product_name')->nullable();
            $table->string('product_qty')->nullable();
            $table->string('product_price')->nullable();
            $table->string('user_name')->nullable();
            $table->string('user_phone')->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_address')->nullable();
            $table->string('user_city')->nullable();
            $table->string('user_state')->nullable();
            $table->string('user_postal_code')->nullable();
            $table->text('payment_id')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('paid_at')->nullable();
            $table->string('order_status')->default(1)->comment('1 - New, 2 - Shipped, 3 - Delivered');
            $table->string('shipped_at')->nullable();
            $table->string('delivered_at')->nullable();
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('orders');
    }
}
