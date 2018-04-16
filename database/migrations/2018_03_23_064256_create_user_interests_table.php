<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_interests', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('interestId');
            $table->integer('answer');
            $table->integer('answerWeight');

            $table->timestamps();

            //Establish Foreign Relationship
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('interestId')->references('id')->on('interests');

            //Establish primary key as userId and interestId
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns
            $table->primary(['userId', 'interestId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_interests');
    }
}
