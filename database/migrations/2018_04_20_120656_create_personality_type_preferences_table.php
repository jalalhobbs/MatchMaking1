<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalityTypePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personality_type_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','personalityTypeId']);
            $table->integer('userId');
            $table->integer('personalityTypeId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('personalityTypeId')->references('id')->on('personality_types');
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
        Schema::dropIfExists('personality_type_preferences');
    }
}
