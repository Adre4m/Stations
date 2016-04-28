<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSampleSitesTable extends Migration
{
    public function up()
    {
        Schema::create('sample_sites', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->double('x');
            $table->double('y');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('sample_sites');
    }
}