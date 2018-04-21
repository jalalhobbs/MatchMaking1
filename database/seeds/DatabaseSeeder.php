<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     *
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
            'genderName' => 'Male',

        ]);

        DB::table('genders')->insert([
            'genderName' => 'Female',

        ]);


        //Religion Table Seed
        //https://www.newsmax.com/thewire/most-popular-religions-sects-images/2014/05/01/id/569022

        DB::table('religions')->insert([
            'religionName' => 'Christian',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Atheist',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Agnostic',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Jewish',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Islamic',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Buddhist',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Hindu',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Sikh',
        ]);

        DB::table('religions')->insert([
            'religionName' => 'Other Religion',
        ]);




        //Body Type Table Seed

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Slim',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Average',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Athletic',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Well Padded',

        ]);


        //Country Table Seed


        DB::table('countries')->insert([
            'countryName' => 'Australia',

        ]);

        DB::table('countries')->insert([
            'countryName' => 'America',

        ]);

        DB::table('countries')->insert([
            'countryName' => 'United Kingdom',

        ]);

        DB::table('countries')->insert([
            'countryName' => 'Europe',

        ]);


        //Ethnicity Table Seed


        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Asian',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Indian',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Middle Eastern',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Black/African',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'White/Caucasian',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Hispanic/Latino',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Maori',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Aboriginal/Torres Strait Islander',
        ]);


        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Pacific Islander',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Mixed ethnicity',
        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Other background',
        ]);
        //Hair Colour Table Seed


        DB::table('hair_colours')->insert([
            'hairColourName' => 'Blonde',

        ]);

        DB::table('hair_colours')->insert([
            'hairColourName' => 'Brown',

        ]);

        DB::table('hair_colours')->insert([
            'hairColourName' => 'Black',

        ]);

        DB::table('hair_colours')->insert([
            'hairColourName' => 'Red',
        ]);

        DB::table('hair_colours')->insert([
            'hairColourName' => 'Other',
        ]);



        //Eye Colour Table Seed
        //https://www.edow.com/general-eye-care/eyecolor/


        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Brown',

        ]);

        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Blue',

        ]);

        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Green',

        ]);

        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Red',

        ]);


        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Grey',

        ]);

        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Other',

        ]);

        //Drinking Table Seed


        DB::table('drinking')->insert([
            'drinkingPrefName' => 'Never',

        ]);

        DB::table('drinking')->insert([
            'drinkingPrefName' => 'Rarely',

        ]);

        DB::table('drinking')->insert([
            'drinkingPrefName' => 'Socially',

        ]);


        DB::table('drinking')->insert([
            'drinkingPrefName' => 'Often',

        ]);

        //Smoking Table Seed


        DB::table('smoking')->insert([
            'smokingPrefName' => 'Never',

        ]);

        DB::table('smoking')->insert([
            'smokingPrefName' => 'Rarely',

        ]);

        DB::table('smoking')->insert([
            'smokingPrefName' => 'Socially',

        ]);

        DB::table('smoking')->insert([
            'smokingPrefName' => 'Often',

        ]);

        //Education Table Seed
        DB::table('education')->insert([
            'educationName' => 'High School',

        ]);

        DB::table('education')->insert([
            'educationName' => 'Certificate/Diploma',

        ]);


        DB::table('education')->insert([
            'educationName' => 'University',

        ]);


        //Leisure Time Seeder
        DB::table('leisures')->insert([
            'leisureName' => 'Mostly sedentary (eg watching TV, playing video games)',

        ]);

        DB::table('leisures')->insert([
            'leisureName' => 'Moderately active (eg long walks, casual bike rides, swimming)',

        ]);

        DB::table('leisures')->insert([
            'leisureName' => 'Active (eg bushwalking, mountain biking, surfing)',

        ]);

        DB::table('leisures')->insert([
            'leisureName' => 'Sporty (eg Play organised sport such as football, jetskiing, rock climbing)',

        ]);

        DB::table('leisures')->insert([
            'leisureName' => 'Adrenaline (eg skydiving, bungee jumping)',

        ]);

        //Personality Type Seeder

        DB::table('personality_types')->insert([
            'personalityTypeName' => 'Romantic',

        ]);

        DB::table('personality_types')->insert([
            'personalityTypeName' => 'Outgoing',

        ]);

        DB::table('personality_types')->insert([
            'personalityTypeName' => 'Stubborn',

        ]);











        $this->call([
            FakeUserSeeder::class,
            FakeMatchesSeeder::class,
        ]);




    }
}
