<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSampleSitesTable extends Migration
{
    public function up()
    {
        Schema::create('sample_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('code');
            $table->string('name');
            $table->double('x');
            $table->double('y');
            $table->integer('station_id')->unsigned();
            $table->timestamps();
            $table->foreign('station_id')->references('id')->on('stations');
        });
    }

    public function down()
    {
        Schema::drop('sample_sites');
    }
}