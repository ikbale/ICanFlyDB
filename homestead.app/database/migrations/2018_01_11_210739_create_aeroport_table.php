<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAeroportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aeroport', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nom_aeroport',100)-> unique();
            $table->string('code_aeroport',3)-> unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('aeroport');
    }
}
