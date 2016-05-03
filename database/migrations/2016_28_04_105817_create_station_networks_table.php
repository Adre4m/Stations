<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: AB60053
 * Date: 28/04/2016
 * Time: 10:58
 */
class CreateStationNetworksTable extends Migration
{

    public function up()
    {
        Schema::create('station_networks', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('station_id')->unsigned();
            $table->integer('network_id')->unsigned();
            $table->foreign('station_id')->references('id')->on('stations');
            $table->foreign('network_id')->references('id')->on('networks');
            $table->timestamps();
            $table->string('began_at');
            $table->string('end_at')->nullable();
        });
    }

    public function down()
    {
        Schema::drop('station_networks');
    }
}