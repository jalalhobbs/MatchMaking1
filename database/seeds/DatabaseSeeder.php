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
            'religionName' => 'Catholicism',

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
            'preferenceName' => 'How much do you like sports Cleaning?',
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
            'preferenceName' => 'Do you drink?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Do you smoke?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Are you married?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'Have you have children?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 2,

        ]);

        DB::table('preferences')->insert([
            'preferenceName' => 'How important to you is education?',
            'preferenceCategoryId' => 3,
            'preferenceTypeId' => 1,

        ]);




    }
}
