<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('preferenceName');
            $table->integer('preferenceCategoryId');
            $table->integer('preferenceTypeId');
            $table->timestamps();

            $table->foreign('preferenceCategoryId')->references('id')->on('preference_categories');
            $table->foreign('preferenceTypeId')->references('id')->on('preference_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
