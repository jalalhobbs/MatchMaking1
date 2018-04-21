<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaturePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stature_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','statureId']);
            $table->integer('userId');
            $table->integer('statureId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('statureId')->references('id')->on('statures');
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
        Schema::dropIfExists('stature_preferences');
    }
}
