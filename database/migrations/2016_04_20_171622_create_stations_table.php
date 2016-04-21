<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: Adrtien
 * Date: 20/04/2016
 * Time: 17:16
 */
class CreateStationsTable extends Migration
{

    public function up()
    {
        Schema::create('stations', function(Blueprint $table) {
            $table->increments('code');
            $table->string('name');
            $table->double('x');
            $table->double('y');
            $table->integer('contributor_id')->unsigned();
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('contributor_id')->references('id')->on('contributors');
        });
    }

    public function down()
    {
        Schema::drop('stations');
    }
}