<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilletTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billet', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_billet',11)-> unique();
            $table->string('prix');
            $table->string('date_emission');
            $table->integer('num_vol')->unsigned();;
            $table->integer('num_ss')->unsigned();;

            $table->timestamps();
        });

        Schema::table('billet', function($table) {
        $table->foreign('num_vol')->references('id')->on('vol')->onDelete('cascade');
        $table->foreign('num_ss')->references('id')->on('personne')->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('billet');
    }
}
