<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->integer('genderId')->nullable();
            $table->integer('height')->nullable();
            $table->integer('bodyTypeId')->nullable();
            $table->integer('religionId')->nullable();
            $table->boolean('verified')->nullable();
            $table->string('facebookProfileLink')->nullable();
            $table->string('document1')->nullable();
            $table->string('document2')->nullable();
            $table->string('document3')->nullable();
            $table->integer('targetGenderId')->nullable();
            $table->integer('targetMinAge')->nullable();
            $table->integer('targetMaxAge')->nullable();
            $table->integer('targetMinHeight')->nullable();
            $table->integer('targetMaxHeight')->nullable();
            $table->integer('targetBodyTypeId')->nullable();
            $table->integer('targetReligionId')->nullable();
            $table->rememberToken();
            $table->timestamps();

            //Establish FK relationships
            $table->foreign('genderId')->references('id')->on('genders');
            $table->foreign('religionId')->references('id')->on('religions');
            $table->foreign('targetReligionId')->references('id')->on('religions');
            $table->foreign('bodyTypeId')->references('id')->on('body_types');
            $table->foreign('targetBodyTypeId')->references('id')->on('body_types');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
