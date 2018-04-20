<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountryPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','countryId']);
            $table->integer('userId');
            $table->integer('countryId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('countryId')->references('id')->on('countries');
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
        Schema::dropIfExists('country_preferences');
    }
}
