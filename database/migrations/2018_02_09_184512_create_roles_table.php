<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('niveau')->unsigned();
            $table->string('name');
            $table->string('description');
            $table->timestamps();
        });
    }
    public function down()
    {

        Schema::dropIfExists('roles');
    }
}
