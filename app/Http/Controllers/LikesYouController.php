<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LikesYouController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        if (($user->dob === null) ||
            ($user->profilePicture === null) ||
            ($user->genderId === null)) {
            session()->flash('status', 'Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.');
            return redirect(route('profile.edit', [auth()->user()->id]));
        } else {


            $likesYouProfiles = DB::select('SELECT
                  users.firstName as firstName,
                  genders.genderName as genderName,
                  users.profilePicture as profilePicture,
                  users.dob as dob,
                  users.id as id,
                  body_types.bodyTypeName as bodyTypeName,
                  genders.genderName as genderName,
                  users.height as height,
                  countries.countryName as countryName,
                  ethnicities.ethnicityName as ethnicityName,
                  education.educationName as educationName,
                  body_types.bodyTypeName as bodyTypeName,
                  religions.religionName as religionName,
                  hair_colours.hairColourName as hairColourName,
                  eye_colours.eyeColourName as eyeColourName,
                  drinking.drinkingPrefName as drinkingPrefName,
                  smoking.smokingPrefName as smokingPrefName,
                  leisures.leisureName as leisureName,
                  personality_types.personalityTypeName as personalityTypeName,
                  my_matches.likeStatus as likeStatus
                FROM (SELECT userId
                      FROM matches
                      WHERE
                        targetId = ' . auth()->user()->id . '
                        AND likeStatus = 2) as their_matches
                  LEFT JOIN (SELECT
                               userId,
                               targetId,
                               likeStatus
                             FROM matches
                             WHERE userId = ' . auth()->user()->id . ') as my_matches ON my_matches.targetId = their_matches.userId
                  LEFT JOIN users ON their_matches.userId = users.id
                  LEFT JOIN genders ON users.genderId = genders.id
                  LEFT JOIN body_types ON users.bodyTypeId = body_types.id
                  LEFT JOIN countries ON users.countryId = countries.id
                  LEFT JOIN education ON users.educationId = education.id
                  LEFT JOIN hair_colours ON users.hairColourId = hair_colours.id
                  LEFT JOIN eye_colours ON users.eyeColourId = eye_colours.id
                  LEFT JOIN ethnicities ON users.ethnicityId = ethnicities.id
                  LEFT JOIN smoking ON users.smokingId = smoking.id
                  LEFT JOIN drinking ON users.drinkingId = drinking.id
                  LEFT JOIN religions ON users.religionId = religions.id
                  LEFT JOIN leisures ON users.leisureId = leisures.id
                  LEFT JOIN personality_types ON users.personalityTypeId = personality_types.id
                WHERE ((my_matches.likeStatus <> 0) OR (my_matches.likeStatus IS NULL))
                GROUP BY their_matches.userId, my_matches.likeStatus');
            foreach ($likesYouProfiles as $likesYouProfile) {
                if (isset($likesYouProfile->dob)) {
                    $likesYouProfile->age = $this->getAge($likesYouProfile->dob);
                } else {
                    $likesYouProfile->age = null;
                }
                if (!isset($likesYouProfile->likeStatus)) {
                    $likesYouProfile->likeStatus = 1;
                }
            }
            return view('home')
                ->with('matches', $likesYouProfiles)
                ->with('pageName', "Likes You");
        }
    }

    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }
}
