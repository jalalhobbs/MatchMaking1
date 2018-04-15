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

        DB::table('genders')->insert([
            'genderName' => 'Other',

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

        DB::table('religions')->insert([
            'religionName' => 'Other',

        ]);

        //Body Type Table Seed


        DB::table('body_types')->insert([
            'bodyTypeName' => 'Very Slim',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Slim',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Average',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Larger than Average',

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => 'Giant',

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

        DB::table('countries')->insert([
            'countryName' => 'Other',

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

        DB::table('ethnicities')->insert([
            'ethnicityName' => 'Other',

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

        DB::table('hair_colours')->insert([
            'hairColourName' => 'Other',

        ]);

        //Preference Types Seed

        DB::table('preference_types')->insert([
            'preferenceTypeName' => 'Normal',

        ]);

        DB::table('preference_types')->insert([
            'preferenceTypeName' => 'Boolean',

        ]);

        //Preference Categories Seed
        DB::table('preference_categories')->insert([
            'preferenceCategoryName' => 'Sports',

        ]);

        DB::table('preference_categories')->insert([
            'preferenceCategoryName' => 'Hobbies',

        ]);

        DB::table('preference_categories')->insert([
            'preferenceCategoryName' => 'Personal',

        ]);


        //Preference Seed for Category 1 = Sports
        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like sports in General?',
            'preferenceCategoryId' => 1,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Basketball?',
            'preferenceCategoryId' => 1,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Soccer?',
            'preferenceCategoryId' => 1,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Rugby?',
            'preferenceCategoryId' => 1,
            'preferenceTypeId' => 1,

        ]);

        //Preference Seed for Category 2 = Hobbies
        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like hobbies in General?',
            'preferenceCategoryId' => 2,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Gardening?',
            'preferenceCategoryId' => 2,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Gaming?',
            'preferenceCategoryId' => 2,
            'preferenceTypeId' => 1,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How much do you like Cleaning?',
            'preferenceCategoryId' => 2,
            'preferenceTypeId' => 1,

        ]);

        //Preference Seed for Category 3 = Personal
        DB::table('preferences')->insert([
        'preferenceName' => 'Am I sociable?',
        'preferenceCategoryId' => 3,
        'preferenceTypeId' => 2,

    ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Do you like to drink?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Do you like to smoke?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Are you married?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Have you had children?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How important to you is education?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 1,

        ]);



        $this->call([
            FakeUserSeeder::class,
        ]);




    }
}
