<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserPreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_preferences', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('preferenceId');
            $table->integer('answer');
            $table->integer('answerWeight');

            $table->timestamps();

            //Establish Foreign Relationship
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('preferenceId')->references('id')->on('preferences');

            //Establish primary key as userId and interestId
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns
            $table->primary(['userId', 'preferenceId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_preferences');
    }
}
