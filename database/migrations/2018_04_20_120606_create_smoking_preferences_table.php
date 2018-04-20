<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSmokingPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smoking_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','smokingId']);
            $table->integer('userId');
            $table->integer('smokingId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('smokingId')->references('id')->on('smoking');
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
        Schema::dropIfExists('smoking_preferences');
    }
}
