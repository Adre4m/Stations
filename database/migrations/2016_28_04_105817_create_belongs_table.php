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
            $table->integer('station_id')->unsigned();
            $table->integer('sample_site_id')->unsigned();
            $table->foreign('station_id')->references('code')->on('stations');
            $table->foreign('sample_site_id')->references('id')->on('sample_sites');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('belongs');
    }
}