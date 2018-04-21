<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgeBracketPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('age_bracket_preferences', function (Blueprint $table) {
            //$table->increments('id');
            $table->primary(['userId','ageBracketId']);
            $table->integer('userId');
            $table->integer('ageBracketId');
            $table->double('weightVector');
            $table->timestamps();


            $table->foreign('ageBracketId')->references('id')->on('age_brackets');
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
        Schema::dropIfExists('age_bracket_preferences');
    }
}
