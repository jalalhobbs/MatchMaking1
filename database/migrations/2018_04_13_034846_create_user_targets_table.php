<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTargetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_targets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('targetGenderId')->nullable();
            $table->integer('targetMinAge')->nullable();
            $table->integer('targetMaxAge')->nullable();
            $table->integer('targetMinHeight')->nullable();
            $table->integer('targetMaxHeight')->nullable();
            $table->integer('targetBodyTypeId')->nullable();
            $table->integer('targetReligionId')->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users');
            $table->foreign('targetGenderId')->references('id')->on('body_types');
            $table->foreign('targetBodyTypeId')->references('id')->on('body_types');
            $table->foreign('targetReligionId')->references('id')->on('religions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_targets');
    }
}
