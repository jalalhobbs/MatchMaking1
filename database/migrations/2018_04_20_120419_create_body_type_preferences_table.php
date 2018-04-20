<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyTypePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_type_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','bodyTypeId']);
            $table->integer('userId');
            $table->integer('bodyTypeId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('bodyTypeId')->references('id')->on('body_types');
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
        Schema::dropIfExists('body_type_preferences');
    }
}
