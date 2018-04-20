<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEthnicityPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ethnicity_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','ethnicityId']);
            $table->integer('userId');
            $table->integer('ethnicityId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('ethnicityId')->references('id')->on('ethnicities');
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
        Schema::dropIfExists('ethnicity_preferences');
    }
}
