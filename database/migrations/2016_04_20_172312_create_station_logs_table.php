<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:23
 */
class CreateStationLogsTable extends Migration
{

    public function up ()
    {
        Schema::create('station_logs', function(Blueprint $table) {
            $table->increments('id');
            $table->longText('msg')->nullable();
            $table->integer('station_id')->unsigned();
            $table->timestamps();
            $table->foreign('station_id')->references('code')->on('stations');
        });
    }

    public function down ()
    {
        Schema::drop('station_logs');
    }
}