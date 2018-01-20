<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersNaviguantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('pers_naviguants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nb_vol_heure',45);
            $table->integer('num_ss')->unsigned();;
            $table->timestamps();
             });
        Schema::table('pers_naviguants', function($table) {
        $table->foreign('num_ss')->references('id')->on('employes')->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pers_naviguants');
    }
}
