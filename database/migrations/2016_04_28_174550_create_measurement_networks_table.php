<?php

/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 17:46
 */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMeasurementNetworksTable extends Migration
{

    public function up()
    {
        Schema::create('measurement_networks', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->timestamps();
            $table->dateTime('began_at');
            $table->dateTime('end_at')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('measurement_networks');
    }
}