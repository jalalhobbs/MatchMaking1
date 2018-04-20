<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','educationId']);
            $table->integer('userId');
            $table->integer('educationId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('educationId')->references('id')->on('education');
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
        Schema::dropIfExists('education_preferences');
    }
}
