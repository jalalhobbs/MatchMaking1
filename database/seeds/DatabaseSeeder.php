<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     *
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Gender Table Seed
        // $this->call(UsersTableSeeder::class);
        DB::table('genders')->insert([
            ['genderName' => 'Male'],
            ['genderName' => 'Female'],
        ]);


        //Religion Table Seed
        //https://www.newsmax.com/thewire/most-popular-religions-sects-images/2014/05/01/id/569022
        DB::table('religions')->insert([
            ['religionName' => 'Christian'],
            ['religionName' => 'Atheist'],
            ['religionName' => 'Agnostic'],
            ['religionName' => 'Jewish'],
            ['religionName' => 'Islamic'],
            ['religionName' => 'Buddhist'],
            ['religionName' => 'Hindu'],
            ['religionName' => 'Sikh'],
            ['religionName' => 'Other Religion'],
        ]);


        //Body Type Table Seed
        DB::table('body_types')->insert([
            ['bodyTypeName' => 'Slim'],
            ['bodyTypeName' => 'Average'],
            ['bodyTypeName' => 'Athletic'],
            ['bodyTypeName' => 'Well Padded'],
        ]);


        //Country Table Seed
        DB::table('countries')->insert([
            ['countryName' => 'Australia'],
            ['countryName' => 'America'],
            ['countryName' => 'United Kingdom'],
            ['countryName' => 'Europe'],
        ]);


        //Ethnicity Table Seed
        DB::table('ethnicities')->insert([
            ['ethnicityName' => 'Asian'],
            ['ethnicityName' => 'Indian'],
            ['ethnicityName' => 'Middle Eastern'],
            ['ethnicityName' => 'Black/African'],
            ['ethnicityName' => 'White/Caucasian'],
            ['ethnicityName' => 'Hispanic/Latino'],
            ['ethnicityName' => 'Maori'],
            ['ethnicityName' => 'Aboriginal/Torres Strait Islander'],
            ['ethnicityName' => 'Pacific Islander'],
            ['ethnicityName' => 'Mixed ethnicity'],
            ['ethnicityName' => 'Other background'],
        ]);


        //Hair Colour Table Seed
        DB::table('hair_colours')->insert([
            ['hairColourName' => 'Blonde'],
            ['hairColourName' => 'Brown'],
            ['hairColourName' => 'Black'],
            ['hairColourName' => 'Red'],
            ['hairColourName' => 'Other'],
        ]);


        //Eye Colour Table Seed
        //https://www.edow.com/general-eye-care/eyecolor/
        DB::table('eye_colours')->insert([
            ['eyeColourName' => 'Brown'],
            ['eyeColourName' => 'Blue'],
            ['eyeColourName' => 'Green'],
            ['eyeColourName' => 'Red'],
            ['eyeColourName' => 'Grey'],
            ['eyeColourName' => 'Other'],
        ]);


        //Drinking Table Seed
        DB::table('drinking')->insert([
            ['drinkingPrefName' => 'Never'],
            ['drinkingPrefName' => 'Rarely'],
            ['drinkingPrefName' => 'Socially'],
            ['drinkingPrefName' => 'Often'],
        ]);


        //Smoking Table Seed
        DB::table('smoking')->insert([
            ['smokingPrefName' => 'Never'],
            ['smokingPrefName' => 'Rarely'],
            ['smokingPrefName' => 'Socially'],
            ['smokingPrefName' => 'Often'],
        ]);


        //Education Table Seed
        DB::table('education')->insert([
            ['educationName' => 'High School'],
            ['educationName' => 'Certificate/Diploma'],
            ['educationName' => 'University'],
        ]);


        //Leisure Time Seeder
        DB::table('leisures')->insert([
            ['leisureName' => 'Mostly sedentary(eg watching TV, playing video games)'],
            ['leisureName' => 'Moderately active(eg long walks, casual bike rides, swimming)'],
            ['leisureName' => 'Active(eg bushwalking, mountain biking, surfing)'],
            ['leisureName' => 'Sporty(eg Play organised sport such as football, jetskiing, rock climbing)'],
            ['leisureName' => 'Adrenaline(eg skydiving, bungee jumping)'],
        ]);


        //Personality Type Seeder
        DB::table('personality_types')->insert([
            ['personalityTypeName' => 'Romantic'],
            ['personalityTypeName' => 'Outgoing'],
            ['personalityTypeName' => 'Stubborn'],
        ]);


        $this->call([
            FakeUserSeeder::class,
            FakeMatchesSeeder::class,
        ]);
    }
}