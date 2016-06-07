<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContributorsTable extends Migration
{

    public function up()
    {
        Schema::create('contributors', function(Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid')->unique();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('last_name');
            $table->string('scheme');
        });
    }

    public function down()
    {
        Schema::drop('contributors');
    }
}