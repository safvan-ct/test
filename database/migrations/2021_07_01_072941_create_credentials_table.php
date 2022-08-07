<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCredentialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->id();

            $table->integer('pid')->nullable();
            $table->string('email')->default('NULL');;
            $table->string('email_password')->default('NULL');;
            $table->string('stream_username')->default('NULL');;
            $table->string('stream_password')->default('NULL');;
            $table->string('send')->default('NULL');;


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
        Schema::dropIfExists('credentials');
    }
}
