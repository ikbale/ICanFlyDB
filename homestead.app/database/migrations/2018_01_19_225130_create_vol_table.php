<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vol', function (Blueprint $table) {
            $table->increments('id');
            $table->string('num_vol',11)-> unique();
            $table->string('date_dep');
            $table->string('date_arr');
            $table->string('horaire_dep',45);
            $table->string('horaire_arr',45);
            $table->string('nb_place_libre',45);
            $table->string('nb_place_occ',45);
            $table->integer('num_imm')->unsigned();;
            $table->string('nom_aeroport_dep',100);
            $table->string('nom_aeroport_arr',100);
            $table->string('code_aeroport_dep',3);
            $table->string('code_aeroport_arr',3);
            $table->timestamps();
        });

        Schema::table('vol', function($table) {
        $table->foreign('num_imm')->references('id')->on('appareil')->onDelete('cascade'); ;
        $table->foreign('nom_aeroport_dep')->references('nom_aeroport')->on('aeroport')->onDelete('cascade');
        $table->foreign('nom_aeroport_arr')->references('nom_aeroport')->on('aeroport')->onDelete('cascade');
        $table->foreign('code_aeroport_dep')->references('code_aeroport')->on('aeroport')->onDelete('cascade');
        $table->foreign('code_aeroport_arr')->references('code_aeroport')->on('aeroport')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vol');
    }
}
