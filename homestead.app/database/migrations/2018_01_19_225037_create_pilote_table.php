<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePiloteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pilote', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_licence',45);
            $table->integer('id_pers_nav')->unsigned();;
            $table->timestamps();    
        });

        Schema::table('pilote', function($table) {
        $table->foreign('id_pers_nav')->references('id')->on('pers_naviguants')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pilote');
    }
}
