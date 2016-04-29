<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 10:58
 */
class CreateBelongsTable extends Migration
{

    public function up()
    {
        Schema::create('belongs', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->integer('station_id')->unsigned();
            $table->integer('measurement_network_id')->unsigned();
            $table->foreign('station_id')->references('code')->on('stations');
            $table->foreign('measurement_network_id')->references('id')->on('measurement_networks');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('belongs');
    }
}