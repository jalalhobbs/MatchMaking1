<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReligionPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('religion_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','religionId']);
            $table->integer('userId');
            $table->integer('religionId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('religionId')->references('id')->on('religions');
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
        Schema::dropIfExists('religion_preferences');
    }
}
