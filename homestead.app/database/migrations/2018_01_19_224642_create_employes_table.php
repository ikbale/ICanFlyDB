<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('salaire',45);
            $table->integer('num_ss')->unsigned();
            $table->string('type');
            $table->timestamps();
        });

        Schema::table('employes', function($table) {
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
        Schema::drop('employes');
    }
}
