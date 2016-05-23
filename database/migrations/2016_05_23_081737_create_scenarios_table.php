<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScenariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scenarios', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('code');
            $table->integer('version');
            $table->string('name');
            $table->timestamp('began_at');
            $table->timestamp('end_at');
            $table->integer('transmitter_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->foreign('transmitter_id')->references('id')->on('contributors');
            $table->foreign('receiver_id')->references('id')->on('contributors');
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
        Schema::drop('scenarios');
    }
}
