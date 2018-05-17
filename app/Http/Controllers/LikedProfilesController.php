<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LikedProfilesController extends Controller
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
            ($user->genderId === null))


        {
            //return redirect(route('lookingfor.edit'));
            //Get Ready to flash a message on the next page



            session()->flash('status', 'Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.');
            return redirect(route('profile.edit', [auth()->user()->id]));
        }
        else {


            $potentialMatches = DB::table('matches')
                ->where('matches.userId', '=', auth()->user()->id)
                ->where('matches.likeStatus', '=', '2')
                ->leftJoin('users', 'matches.targetId', '=', 'users.id')
                ->leftJoin('genders', 'users.genderId', '=', 'genders.id')
                ->leftJoin('body_types', 'users.bodyTypeId', '=', 'body_types.id')
                ->leftJoin('countries', 'users.countryId', '=', 'countries.id')
                ->leftJoin('ethnicities', 'users.ethnicityId', '=', 'ethnicities.id')
                ->leftJoin('education', 'users.educationId', '=', 'education.id')
                ->leftJoin('religions', 'users.religionId', '=', 'religions.id')
                ->leftJoin('hair_colours', 'users.hairColourId', '=', 'hair_colours.id')
                ->leftJoin('eye_colours', 'users.eyeColourId', '=', 'eye_colours.id')
                ->leftJoin('drinking', 'users.drinkingId', '=', 'drinking.id')
                ->leftJoin('smoking', 'users.smokingId', '=', 'smoking.id')
                ->leftJoin('leisures', 'users.leisureId', '=', 'leisures.id')
                ->leftJoin('personality_types', 'users.personalityTypeId', '=', 'personality_types.id')
                ->select('users.firstName',
                    'genders.genderName',
                    'users.profilePicture',
                    'users.dob',
                    'users.id',
                    'body_types.bodyTypeName',
                    'users.height',
                    'countries.countryName',
                    'ethnicities.ethnicityName',
                    'education.educationName',
                    'religions.religionName',
                    'hair_colours.hairColourName',
                    'eye_colours.eyeColourName',
                    'drinking.drinkingPrefName',
                    'smoking.smokingPrefName',
                    'leisures.leisureName',
                    'personality_types.personalityTypeName',
                    'matches.likeStatus'
                )
                ->get();
$potentialMatches = DB::select('SELECT
  users.firstName                       as firstName,
  genders.genderName                    as genderName,
  users.profilePicture                  as profilePicture,
  users.dob                             as dob,
  users.id                              as id,
  body_types.bodyTypeName               as bodyTypeName,
  genders.genderName                    as genderName,
  users.height                          as height,
  countries.countryName                 as countryName,
  ethnicities.ethnicityName             as ethnicityName,
  education.educationName               as educationName,
  body_types.bodyTypeName               as bodyTypeName,
  religions.religionName                as religionName,
  hair_colours.hairColourName           as hairColourName,
  eye_colours.eyeColourName             as eyeColourName,
  drinking.drinkingPrefName             as drinkingPrefName,
  smoking.smokingPrefName               as smokingPrefName,
  leisures.leisureName                  as leisureName,
  personality_types.personalityTypeName as personalityTypeName,
  my_matches.likeStatus                 as likeStatus
FROM (SELECT
        userId,
        targetId,
        likeStatus
      FROM matches
      WHERE userId = '.auth()->user()->id.' AND likeStatus = 2) as my_matches
  LEFT JOIN (SELECT
               userId,
               likeStatus
             FROM matches
             WHERE
               targetId = '.auth()->user()->id.') as their_matches ON my_matches.targetId = their_matches.userId
  LEFT JOIN users ON my_matches.targetId = users.id
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
WHERE ((their_matches.likeStatus = 1) OR (their_matches.likeStatus IS NULL))
GROUP BY my_matches.targetId, their_matches.likeStatus');

            foreach ($potentialMatches as $potentialMatch) {
                if (isset($potentialMatch->dob)) {
                    $potentialMatch->age = $this->getAge($potentialMatch->dob);
                } else {
                    $potentialMatch->age = null;
                }
                if (isset($potentialMatch->height)) {
                    if ($potentialMatch->height < 160) {
                        $potentialMatch->stature = "short";
                    } elseif ($potentialMatch->height <= 180) {
                        $potentialMatch->stature = "average";
                    } elseif ($potentialMatch->height > 180) {
                        $potentialMatch->stature = "tall";
                    }
                }
            }

            return view('home')
                ->with('matches', $potentialMatches)
                ->with('pageName', "Liked Profiles");
        }
    }

    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }

}
