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
            $table->integer('code_station')->unsigned();
            $table->timestamp('created_at');
            $table->foreign('code_station')->references('code')->on('stations');
        });
    }

    public function down ()
    {
        Schema::drop('station_logs');
    }
}