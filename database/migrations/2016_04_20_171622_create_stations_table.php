<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Created by PhpStorm.
 * User: Adrien
 * Date: 20/04/2016
 * Time: 17:16
 */
class CreateStationsTable extends Migration
{

    /**
     * Définition de la table, dans la base de donnée.
     */
    public function up()
    {
        Schema::create('stations', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->integer('code')->unique();
            $table->string('name');
            $table->double('x');
            $table->double('y');
            $table->timestamps();
            $table->integer('manager_id')->unsigned();
            $table->integer('owner_id')->unsigned();
            $table->foreign('manager_id')->references('id')->on('contributors');
            $table->foreign('owner_id')->references('id')->on('contributors');
        });
    }

    public function down()
    {
        Schema::drop('stations');
    }
}