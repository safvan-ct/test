<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('brand')->nullable();
            $table->text('description')->nullable();
            $table->text('specification')->nullable();
            $table->integer('offer')->nullable();
            $table->float('offer_rate', 8, 2)->nullable();
            $table->string('image')->nullable();
            $table->string('rate')->nullable();
            $table->integer('current_rate')->nullable();
            $table->string('credential')->default('NULL');
            $table->integer('count')->default(0);
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
        Schema::dropIfExists('accounts');
    }
}
