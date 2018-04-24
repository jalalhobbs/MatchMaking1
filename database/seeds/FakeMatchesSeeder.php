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
        //keep this value same as in FakeUserSeeders
        $users = DB::table('users')
            ->select(
                'id',
                'targetMinAge',
                'targetMaxAge',
                'targetCountryId',
                'targetEthnicityId',
                'targetMinHeight',
                'targetMaxHeight',
                'targetBodyId',
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
            $maxMatches = $user->id < 10 ? 10 : 3;

            $usersToLike = DB::table('users')
                ->where('users.id', '<>', $user->id);

            if($user->targetMinAge) {
                $usersToLike
                    ->where('users.dob', '<', date('YYYY-mm-dd', strtotime($user->targetMinAge . "year")));
            }
        $usersToLike = $usersToLike
            ->select('users.id as id')
            ->get();

            foreach($usersToLike as $userToLike) {
                array_push($matches, ['userId' => $user->id, 'targetId' => $userToLike->id, 'likeStatus' => 2]);
                if (count($matches) >= $maxMatches) {
                    break;
                }
            }
            DB::table('matches')
                ->insert($matches);
            $matches = array();
        }

    }
}


