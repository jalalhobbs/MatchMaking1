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
        //https://www.newsmax.com/thewire/most-popular-religions-sects-images/2014/05/01/id/569022/
        DB::table('religions')->insert([
            'religionName' => 'None',

        ]);

        DB::table('religions')->insert([
            'religionName' => 'Christianity',

        ]);

        DB::table('religions')->insert([
            'religionName' => 'Catholic',

        ]);

        DB::table('religions')->insert([
            'religionName' => 'Islam',

        ]);

        DB::table('religions')->insert([
            'religionName' => 'Hinduism',

        ]);

        DB::table('religions')->insert([
            'religionName' => 'Agnosticism',

        ]);


        //Body Type Table Seed


        DB::table('body_types')->insert([
            'bodyTypeName' => 'Thin',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Average',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Athletic',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Muscular',

        ]);

        DB::table('body_types')->insert([
        'bodyTypeName' => 'A Bit Overweight',

         ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Overweight',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Very Overweight',

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
            'ethnicityName' => 'Australian',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'American',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Asian',

        ]);

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'European',

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
            'hairColourName' => 'Grey',

        ]);

        DB::table('hair_colours')->insert([
            'hairColourName' => 'White',

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
            'eyeColourName' => 'Hazel',

        ]);

        DB::table('eye_colours')->insert([
            'eyeColourName' => 'Grey',

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
            'drinkingPrefName' => 'Weekly',

        ]);

        DB::table('drinking')->insert([
            'drinkingPrefName' => 'Daily',

        ]);

        //Smoking Table Seed


        DB::table('smoking')->insert([
            'smokingPrefName' => 'No',

        ]);

        DB::table('smoking')->insert([
            'smokingPrefName' => 'Yes',

        ]);

        //Education Table Seed
        DB::table('education')->insert([
            'educationName' => 'High School',

        ]);

        DB::table('education')->insert([
            'educationName' => 'Certicate',

        ]);

        DB::table('education')->insert([
            'educationName' => 'Diploma',

        ]);

        DB::table('education')->insert([
            'educationName' => 'Degree',

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
