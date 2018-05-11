<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MatchesController extends Controller
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

            $matches = DB::select('SELECT
                              users.firstName,
                              genders.genderName,
                              users.profilePicture,
                              users.dob,
                              users.id,
                              users.email,
                              body_types.bodyTypeName,
                              genders.genderName,
                              users.height,
                              countries.countryName,
                              ethnicities.ethnicityName,
                              education.educationName,
                              body_types.bodyTypeName,
                              religions.religionName,
                              hair_colours.hairColourName,
                              eye_colours.eyeColourName,
                              drinking.drinkingPrefName,
                              smoking.smokingPrefName,
                              leisures.leisureName,
                              personality_types.personalityTypeName,
                              my_matches.likeStatus
                              
                            FROM matches as my_matches
                              JOIN matches as their_matches ON my_matches.targetId = their_matches.userId
                              JOIN users ON my_matches.targetId = users.id
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
                            WHERE my_matches.userId = ' . auth()->user()->id . '
                                  AND their_matches.targetId =' . auth()->user()->id . '
                                  AND my_matches.likeStatus = 2
                                  AND their_matches.likeStatus = 2');

            foreach ($matches as $match) {
                if (isset($match->dob)) {
                    $match->age = $this->getAge($match->dob);
                } else {
                    $match->age = null;
                }
            }

            return view('home')
                ->with('matches', $matches)
                ->with('pageName', "Matches");
        }
    }


    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }
}