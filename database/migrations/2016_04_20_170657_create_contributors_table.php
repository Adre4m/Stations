<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContributorsTable extends Migration
{

    public function up()
    {
        Schema::create('contributors', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('last_name');
        });
    }

    public function down()
    {
        Schema::drop('contributors');
    }
}