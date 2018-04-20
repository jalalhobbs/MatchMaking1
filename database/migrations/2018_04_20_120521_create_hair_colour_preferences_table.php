<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHairColourPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hair_colour_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','hairColourId']);
            $table->integer('userId');
            $table->integer('hairColourId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('hairColourId')->references('id')->on('hair_colours');
            $table->foreign('userId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hair_colour_preferences');
    }
}
