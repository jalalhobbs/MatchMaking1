<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkingPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drinking_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','drinkingId']);
            $table->integer('userId');
            $table->integer('drinkingId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('drinkingId')->references('id')->on('drinking');
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
        Schema::dropIfExists('drinking_preferences');
    }
}
