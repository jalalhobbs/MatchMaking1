<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEyeColourPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eye_colour_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','eyeColourId']);
            $table->integer('userId');
            $table->integer('eyeColourId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('eyeColourId')->references('id')->on('eye_colours');
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
        Schema::dropIfExists('eye_colour_preferences');
    }
}
