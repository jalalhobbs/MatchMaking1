<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGenderPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gender_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','genderId']);
            $table->integer('userId');
            $table->integer('genderId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('genderId')->references('id')->on('genders');
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
        Schema::dropIfExists('gender_preferences');
    }
}
