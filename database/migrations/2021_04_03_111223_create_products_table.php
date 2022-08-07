<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('category_id')->nullable();
            $table->string('sub_category_id')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('offer')->nullable();
            $table->float('offer_price', 8, 2)->nullable();
            $table->string('stock')->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->default('none')->comment('featured and none featured product');
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
        Schema::dropIfExists('products');
    }
}
