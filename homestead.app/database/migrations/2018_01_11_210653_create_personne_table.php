<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('personne', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_ss',11)-> unique();
            $table->string('nom',45);
            $table->string('prenom',45);
            $table->string('adresse',45);
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
        Schema::drop('personne');
    }
}
