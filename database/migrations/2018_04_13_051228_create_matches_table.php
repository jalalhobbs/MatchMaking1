<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('matchId');
            $table->timestamps();

            //Establish Foreign Relationship
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('matchId')->references('id')->on('users');

            //Establish primary key as userId and interestId
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns
            $table->primary(['userId', 'matchId']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
