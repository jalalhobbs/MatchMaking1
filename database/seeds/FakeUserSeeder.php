<?php

use Illuminate\Database\Seeder;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maxUsers = 500;
        $year = 1940;
        for ($x = 0; $x <= $maxUsers; $x++) {

            $fName = "Tom" . $x;
            $sName = "Thumb" . $x;

            $genderId = rand(1, 3);
            if ($genderId === 1)
            {
                $fName = "Tom" . $x;
                $sName = "Thumb" . $x;
            }

            if($genderId === 2)
            {
                $fName = "Jillian" . $x;
                $sName = "Hill" . $x;
            }

            if($genderId === 3)
            {
                $fName = "Discovering" . $x;
                $sName = "Myself" . $x;
            }

            $eMail = "fake" . $x . "@fake.com";

            $year ++;
            if($year > 2000)
                $year = 1940;
            $dob = $year . "-09-28";

            $targetMinAge = rand(18, 120);
            $targetMaxAge = rand(18, 120);

            if($targetMinAge >= $targetMaxAge)
            {
                if($targetMinAge === $targetMaxAge)
                {
                    if($targetMinAge < 24)
                    {
                        $targetMaxAge = $targetMaxAge + 5;
                    }
                    elseif ($targetMaxAge > 114)
                    {
                        $targetMinAge = $targetMinAge - 5;
                    }

                }
                else
                {
                    $temp = $targetMinAge;
                    $targetMinAge = $targetMaxAge;
                    $targetMaxAge = $temp;
                }
            }

            $targetMinHeight = rand(60, 250);
            $targetMaxHeight = rand(60, 250);

            if($targetMinHeight >= $targetMaxHeight)
            {
                if($targetMinHeight === $targetMaxHeight)
                {
                    if($targetMinHeight < 76)
                    {
                        $targetMaxHeight = $targetMaxHeight + 5;
                    }
                    elseif ($targetMaxHeight > 244)
                    {
                        $targetMinHeight = $targetMinHeight - 5;
                    }

                }
                else
                {
                    $temp = $targetMinHeight;
                    $targetMinHeight = $targetMaxHeight;
                    $targetMaxHeight = $temp;
                }
            }

            $createdAt = "2017" . "-" . rand(1, 12) . "-" . rand(1, 28) ;
            $updatedAt = "2018" . "-" . rand(1, 12) . "-" . rand(1, 28) ;


            DB::table('users')->insert([
                'firstName' => $fName,
                'lastName' => $sName,
                'email' => $eMail,
                'profilePicture' => 'https://i.pinimg.com/564x/44/30/e4/4430e41d9a72c09c6ac2c98fc6bc9c03.jpg',
                'password' => '$2y$10$DpEuRrTxGF1cKs2WM5IAa.jSXdWvJ19bWqUloCp82clbipEvHOkRK',
                'dob' => $dob,
                'genderId' => $genderId,
                'bodyTypeId' => rand(1, 5),
                'religionId' => rand(1, 7),
                'countryId' => rand(1, 5),
                'ethnicityId' => rand(1, 5),
                'hairColourId' => rand(1, 7),
                'eyeColourId' => rand(1, 4),
                'educationId' => rand(1, 4),
                'drinkingId' => rand(1, 4),
                'smokingId' => rand(1, 2),
                'leisureId' => rand(1, 5),
                'personalityTypeId' => rand(1, 3),
                'height' => rand(60, 250),
                'targetGenderId' => rand(1, 3),
                'targetMaxAge' => $targetMaxAge,
                'targetMinAge' => $targetMinAge,
                'targetMinHeight' => $targetMinHeight,
                'targetMaxHeight' => $targetMaxHeight,
                'targetBodyTypeId' => rand(1, 5),
                'targetReligionId' => rand(1, 7),
                'targetCountryId' => rand(1, 5),
                'targetEthnicityId' => rand(1, 5),
                'targetHairColourId' => rand(1, 7),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
                'verified' => rand(0,1),
            ]);

        }
    }
}
