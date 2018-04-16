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
        $maxUsers = 500;
        for ($userId = 1; $userId <= $maxUsers; $userId++) {

            if($userId < 10)
            {
                $maxMatches = 10;
            }
            else
            {
                $maxMatches = 3;
            }

            for ($y = 1; $y < $maxMatches; $y++) {
                $targetId = rand(1, $maxUsers);
                if ($userId === $targetId) {
                    $targetId++;
                    if ($targetId > $maxMatches) {
                        $targetId = $targetId - 5;
                    }
                }

                $matching = TRUE;
                while($matching) {

                    if (DB::table('matches')->where('userId', '=', $userId)->where('targetId', '=', $targetId)->count()) {

                        $targetId = rand(1, $maxUsers);
                        continue;
                    }
                    $matching = FALSE;
                }

                DB::table('matches')->insert(['userId' => $userId, 'targetId' => $targetId]);
                $matching = TRUE;
                while($matching) {

                    if (DB::table('matches')->where('userId', '=', $targetId)->where('targetId', '=', $userId)->count()) {

                        $userId = rand(1, $maxUsers);
                        continue;
                    }
                    $matching = FALSE;
                }
                DB::table('matches')->insert(['userId' => $targetId, 'targetId' => $userId]);
            }
        }
    }
}
