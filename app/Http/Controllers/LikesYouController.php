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
            ($user->genderId === null))


        {
            //return redirect(route('lookingfor.edit'));
            //Get Ready to flash a message on the next page



            session()->flash('status', 'Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.');
            return redirect(route('profile.edit', [auth()->user()->id]));
        }
        else {


            $likesYouProfiles = DB::select('SELECT
                              users.firstName,
                              genders.genderName,
                              users.profilePicture,
                              users.dob,
                              users.id,
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
                              
                            FROM matches as their_matches
                              LEFT JOIN matches as my_matches ON their_matches.userId = my_matches.targetId
                              JOIN users ON their_matches.userId = users.id
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
                            WHERE their_matches.targetId = ' . auth()->user()->id . '
                                  AND my_matches.likeStatus <> 0
                                  AND their_matches.likeStatus = 2');
            foreach ($likesYouProfiles as $likesYouProfile) {
                if (isset($likesYouProfile->dob)) {
                    $likesYouProfile->age = $this->getAge($likesYouProfile->dob);
                } else {
                    $likesYouProfile->age = null;
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
