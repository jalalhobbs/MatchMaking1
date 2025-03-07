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
            $table->integer('targetId');
            $table->tinyInteger('likeStatus')->default('1'); // 0 = dislike; 1 = undecided; 2 = like
            $table->dateTime('expiryDateTime')->nullable();
            $table->timestamps();

            //Establish Foreign Relationship
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('targetId')->references('id')->on('users');

            //Establish primary key as userId and interestId
            //Inspired by: https://stackoverflow.com/questions/20065697/schema-builder-laravel-migrations-unique-on-two-columns
            $table->primary(['userId', 'targetId']);
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
