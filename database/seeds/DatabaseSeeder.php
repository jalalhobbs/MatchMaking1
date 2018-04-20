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






        $this->call([
            FakeUserSeeder::class,
            FakeMatchesSeeder::class,
        ]);




    }
}
