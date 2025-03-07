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
            $table->string('profilePicture')->nullable();
            $table->string('password')->nullable();
            $table->date('dob')->nullable();
            $table->integer('genderId')->nullable();
            $table->integer('height')->nullable();
            $table->integer('statureId')->nullable();


            $table->integer('bodyTypeId')->nullable();
            $table->integer('religionId')->nullable();
            $table->integer('countryId')->nullable();

            $table->integer('ethnicityId')->nullable();
            $table->integer('hairColourId')->nullable();
            $table->integer('eyeColourId')->nullable();
            $table->integer('educationId')->nullable();
            $table->integer('drinkingId')->nullable();
            $table->integer('smokingId')->nullable();
            $table->integer('leisureId')->nullable();
            $table->integer('personalityTypeId')->nullable();

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
            $table->integer('targetCountryId')->nullable();
            $table->integer('targetEthnicityId')->nullable();
            $table->integer('targetHairColourId')->nullable();
            $table->integer('targetEyeColourId')->nullable();
            $table->integer('targetEducationId')->nullable();
            $table->integer('targetDrinkingId')->nullable();
            $table->integer('targetSmokingId')->nullable();
            $table->integer('targetLeisureId')->nullable();
            $table->integer('targetPersonalityTypeId')->nullable();


            $table->rememberToken();
            $table->timestamps();

            //Establish FK relationships
            $table->foreign('genderId')->references('id')->on('genders');
            $table->foreign('statureId')->references('id')->on('statures');

            $table->foreign('religionId')->references('id')->on('religions');
            $table->foreign('bodyTypeId')->references('id')->on('body_types');
            $table->foreign('countryId')->references('id')->on('countries');
            $table->foreign('ethnicityId')->references('id')->on('ethnicities');
            $table->foreign('hairColourId')->references('id')->on('hair_colours');
            $table->foreign('eyeColourId')->references('id')->on('eye_colours');
            $table->foreign('educationId')->references('id')->on('education');
            $table->foreign('drinkingId')->references('id')->on('drinking');
            $table->foreign('smokingId')->references('id')->on('smoking');
            $table->foreign('leisureId')->references('id')->on('leisures');
            $table->foreign('personalityTypeId')->references('id')->on('personality_types');

            $table->foreign('targetGenderId')->references('id')->on('genders');
            $table->foreign('targetBodyTypeId')->references('id')->on('body_types');
            $table->foreign('targetReligionId')->references('id')->on('religions');
            $table->foreign('targetCountryId')->references('id')->on('countries');
            $table->foreign('targetEthnicityId')->references('id')->on('ethnicities');
            $table->foreign('targetHairColourId')->references('id')->on('hair_colours');
            $table->foreign('targetEyeColourId')->references('id')->on('eye_colours');
            $table->foreign('targetEducationId')->references('id')->on('education');
            $table->foreign('targetDrinkingId')->references('id')->on('drinking');
            $table->foreign('targetSmokingId')->references('id')->on('smoking');
            $table->foreign('targetLeisureId')->references('id')->on('leisures');
            $table->foreign('targetPersonalityTypeId')->references('id')->on('personality_types');




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
