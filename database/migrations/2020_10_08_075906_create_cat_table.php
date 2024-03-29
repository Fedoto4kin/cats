<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cats', function (Blueprint $table) {
          $table->increments('id');
          $table->text('name');
          $table->string('pic_id');
          $table->integer('user_id')->unsigned()->nullable();
          $table->foreign('user_id')
              ->references('id')->on('users')
              ->onDelete('set null');
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
         Schema::dropIfExists('cats');
    }
}
