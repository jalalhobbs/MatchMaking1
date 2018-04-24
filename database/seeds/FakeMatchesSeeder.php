<?php

use Illuminate\Database\Seeder;

class FakeMatchesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startTime = microtime(true);

        $users = DB::table('users')
            ->select(
                'id',
                'targetGenderId',
                'targetMinAge',
                'targetMaxAge',
                'targetCountryId',
                'targetEthnicityId',
                'targetMinHeight',
                'targetMaxHeight',
                'targetBodyTypeId',
                'targetEducationId',
                'targetReligionId',
                'targetHairColourId',
                'targetEyeColourId',
                'targetDrinkingId',
                'targetSmokingId',
                'targetLeisureId',
                'targetPersonalityTypeId'
            )
            ->get();
        $matches = array();
        foreach ($users as $user) {
            $maxMatches = $user->id < 10 ? 20 : 5;

            $usersToLike = DB::table('users')
                ->where('users.id', '<>', $user->id);

            if ($user->targetGenderId) {
                $usersToLike
                    ->where('users.genderId', '=', $user->targetGenderId);
            }

            if ($user->targetMinAge) {
                $usersToLike
                    ->where('users.dob', '<', date('YYYY-mm-dd', strtotime($user->targetMinAge . "year")));
            }

            if ($user->targetMaxAge) {
                $usersToLike
                    ->where('users.dob', '>', date('YYYY-mm-dd', strtotime($user->targetMaxAge . "year")));
            }

            if ($user->targetMinHeight) {
                $usersToLike
                    ->where('users.Height', '>=', $user->targetMinHeight);
            }

            if ($user->targetMaxHeight) {
                $usersToLike
                    ->where('users.Height', '<=', $user->targetMaxHeight);
            }

            if ($user->targetBodyTypeId) {
                $usersToLike
                    ->where('users.BodyTypeId', '=', $user->targetBodyTypeId);
            }

            if ($user->targetReligionId) {
                $usersToLike
                    ->where('users.ReligionId', '=', $user->targetReligionId);
            }

            if ($user->targetCountryId) {
                $usersToLike
                    ->where('users.CountryId', '=', $user->targetCountryId);
            }

            if ($user->targetEthnicityId) {
                $usersToLike
                    ->where('users.EthnicityId', '=', $user->targetEthnicityId);
            }

            if ($user->targetHairColourId) {
                $usersToLike
                    ->where('users.HairColourId', '=', $user->targetHairColourId);
            }

            if ($user->targetEyeColourId) {
                $usersToLike
                    ->where('users.EyeColourId', '=', $user->targetEyeColourId);
            }

            if ($user->targetEducationId) {
                $usersToLike
                    ->where('users.EducationId', '=', $user->targetEducationId);
            }

            if ($user->targetDrinkingId) {
                $usersToLike
                    ->where('users.DrinkingId', '=', $user->targetDrinkingId);
            }

            if ($user->targetSmokingId) {
                $usersToLike
                    ->where('users.SmokingId', '=', $user->targetSmokingId);
            }

            if ($user->targetLeisureId) {
                $usersToLike
                    ->where('users.LeisureId', '=', $user->targetLeisureId);
            }

            if ($user->targetPersonalityTypeId) {
                $usersToLike
                    ->where('users.PersonalityTypeId', '=', $user->targetPersonalityTypeId);
            }

            $usersToLike = $usersToLike
                ->select('users.id as id')
                ->get();

            foreach ($usersToLike as $userToLike) {
                array_push($matches, ['userId' => $user->id, 'targetId' => $userToLike->id, 'likeStatus' => 2]);

                if (count($matches) >= $maxMatches) {
                    DB::table('matches')
                        ->insert($matches);
                    $matches = array();
                    break;
                }
            }

            if (count($matches) > 0) {
                DB::table('matches')
                    ->insert($matches);
                $matches = array();
            }
        }
        echo (PHP_EOL . microtime(true) - $startTime) * 1000 . "ms" . PHP_EOL;
    }
}


