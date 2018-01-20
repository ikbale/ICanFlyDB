<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipageMemberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipage_member', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fonction',45);
            $table->integer('id_pers_nav')->unsigned();;
            $table->timestamps();
        });

        Schema::table('equipage_member', function($table) {
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
        Schema::drop('equipage_member');
    }
}
