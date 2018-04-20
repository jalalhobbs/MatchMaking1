<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeisurePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leisure_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','leisureId']);
            $table->integer('userId');
            $table->integer('leisureId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('leisureId')->references('id')->on('leisures');
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
        Schema::dropIfExists('leisure_preferences');
    }
}
