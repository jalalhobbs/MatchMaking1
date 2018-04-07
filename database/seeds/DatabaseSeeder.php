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


        // $this->call(UsersTableSeeder::class);
        DB::table('genders')->insert([
            'genderName' => str_random(10),

        ]);

        DB::table('religions')->insert([
            'religionName' => str_random(10),

        ]);

        DB::table('body_types')->insert([
            'bodyTypeName' => str_random(10),

        ]);
    }
}
