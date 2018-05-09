<?php

namespace App\Http\Controllers;

use http\Env\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
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


        if (auth()->user()->id) {
            //Checks whether to initiate Initial account setup OR continue.
            //Target (constraint) attributes are optional so no checking of constraints is required
            // What needs to be checked are mandatory profile information e.g. DOB, profile pic, gender.

            $user = DB::table('users')->where('id', auth()->user()->id)->first();

            if (($user->dob === null) &&
                ($user->profilePicture === null) &&
                ($user->genderId === null))


            {
                //return redirect(route('lookingfor.edit'));
                //Get Ready to flash a message on the next page

                session()->flash('status', 'Please complete your profile by entering your Date of Birth, Gender and your Profile Picture.');





                return redirect(route('profile.edit', [auth()->user()->id]));
            }
            else {
                //Account Already Setup
                //redirect home page.
                //Get Ready to flash a message on the next page

                //Do something.....
                $potentialMatches = array_slice($this->sortMatches($this->getPotentialMatches(auth()->user()->id),
                    $this->getWeightVectorMatrix(auth()->user()->id)), 0, 12);
                return view('home')
                    ->with('matches', $potentialMatches)
                    ->with('pageName', "Home");



            }


        } else {
            return view('home')
                ->with('pageName', "Home");
        }
    }

    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }

    private function getWeightVectorMatrix($id)
    {
        $weightVectorMatrixOutput = array(
            "gender" => array(),
            "country" => array(),
            "verified" => array(),
            "education" => array(),
            "stature" => array(),
            "bodyType" => array(),
            "hairColour" => array(),
            "eyeColour" => array(),
            "ethnicity" => array(),
            "smoking" => array(),
            "drinking" => array(),
            "religion" => array(),
            "leisure" => array(),
            "personalityType" => array()
        );


        // Like Weight multiplier
        $like_wm_gender = 1.0;
        $like_wm_country = 1.0;
        $like_wm_verified = 0.9;
        $like_wm_education = 0.8;
        $like_wm_ageBucket = 0.9;
        $like_wm_stature = 0.85;
        $like_wm_bodyType = 0.7;
        $like_wm_hairColour = 0.5;
        $like_wm_eyeColour = 0.5;
        $like_wm_ethnicity = 0.8;
        $like_wm_smoking = 0.7;
        $like_wm_drinking = 0.7;
        $like_wm_religion = 0.8;
        $like_wm_leisure = 0.5;
        $like_wm_personalityType = 0.5;

        // DisLike Weight multiplier
        $dislike_multipler = -0.5;
        $dislike_wm_gender = $like_wm_gender * $dislike_multipler;
        $dislike_wm_country = $like_wm_country * $dislike_multipler;
        $dislike_wm_verified = $like_wm_verified * $dislike_multipler;
        $dislike_wm_education = $like_wm_education * $dislike_multipler;
        $dislike_wm_ageBucket = $like_wm_ageBucket * $dislike_multipler;
        $dislike_wm_stature = $like_wm_stature * $dislike_multipler;
        $dislike_wm_bodyType = $like_wm_bodyType * $dislike_multipler;
        $dislike_wm_hairColour = $like_wm_hairColour * $dislike_multipler;
        $dislike_wm_eyeColour = $like_wm_eyeColour * $dislike_multipler;
        $dislike_wm_ethnicity = $like_wm_ethnicity * $dislike_multipler;
        $dislike_wm_smoking = $like_wm_smoking * $dislike_multipler;
        $dislike_wm_drink = $like_wm_drinking * $dislike_multipler;
        $dislike_wm_religion = $like_wm_religion * $dislike_multipler;
        $dislike_wm_leisure = $like_wm_leisure * $dislike_multipler;
        $dislike_wm_personalityType = $like_wm_personalityType * $dislike_multipler;

        $likedOrDislikedUsers = DB::table('matches')
            ->where('userId', $id)
            ->where('matches.likeStatus', '<>', '1')
            ->leftJoin('users', 'matches.targetId', '=', 'users.id')
            ->select([
                'matches.targetId as id',
                'users.genderId',
                'users.countryId',
                'users.verified as verified',
                'users.educationId',
                'users.dob',
                'users.height',
                'users.bodyTypeId',
                'users.hairColourId',
                'users.eyeColourId',
                'users.ethnicityId',
                'users.smokingId',
                'users.drinkingId',
                'users.religionId',
                'matches.likeStatus',
                'users.leisureId',
                'users.personalityTypeId'
            ])
            ->get();
//return(json_encode($likedOrDislikedUsers));
        foreach ($likedOrDislikedUsers as $user) {

            // create age from dob response and add age bucket
            if (isset($user->dob)) {
                $user->age = $this->getAge($user->dob);
                if ($user->age <= 25) {
                    $user->ageBucket = "age18To25";
                } elseif ($user->age <= 35) {
                    $user->ageBucket = "age26To35";
                } elseif ($user->age <= 45) {
                    $user->ageBucket = "age36To45";
                } else {
                    $user->ageBucket = "age46To";
                }
            }
            // add stature
            if (isset($user->height)) {
                if ($user->height < 160) {
                    $user->stature = "Short";
                } elseif ($user->height <= 180) {
                    $user->stature = "Average";
                } elseif ($user->height > 180) {
                    $user->stature = "Tall";
                }
            }

            if (isset($user->likeStatus)) { // like
                // set outputMatrix
                // gender
                if (isset($user->genderId)) {
                    if (isset($weightVectorMatrixOutput['gender'][$user->genderId])) {
                        $weightVectorMatrixOutput['gender'][$user->genderId] += $user->likeStatus == 2 ? $like_wm_gender : $dislike_wm_gender;
                    } else {
                        $weightVectorMatrixOutput['gender'][$user->genderId] = $user->likeStatus == 2 ? $like_wm_gender : $dislike_wm_gender;
                    }
                }
                // country
                if (isset($user->countryId)) {
                    if (isset($weightVectorMatrixOutput['country'][$user->countryId])) {
                        $weightVectorMatrixOutput['country'][$user->countryId] += $user->likeStatus == 2 ? $like_wm_country : $dislike_wm_country;
                    } else {
                        $weightVectorMatrixOutput['country'][$user->countryId] = $user->likeStatus == 2 ? $like_wm_country : $dislike_wm_country;
                    }
                }
                // verified
                if (isset($user->verified)) {
                    if (isset($weightVectorMatrixOutput['verified'][$user->verified])) {
                        $weightVectorMatrixOutput['verified'][$user->verified] += $user->likeStatus == 2 ? $like_wm_verified : $dislike_wm_verified;
                    } else {
                        $weightVectorMatrixOutput['verified'][$user->verified] = $user->likeStatus == 2 ? $like_wm_verified : $dislike_wm_verified;
                    }
                }
                // education
                if (isset($user->educationId)) {
                    if (isset($weightVectorMatrixOutput['education'][$user->educationId])) {
                        $weightVectorMatrixOutput['education'][$user->educationId] += $user->likeStatus == 2 ? $like_wm_education : $dislike_wm_education;
                    } else {
                        $weightVectorMatrixOutput['education'][$user->educationId] = $user->likeStatus == 2 ? $like_wm_education : $dislike_wm_education;
                    }
                }

                // ageBucket
                if (isset($user->ageBucket)) {
                    if (isset($weightVectorMatrixOutput['ageBucket'][$user->ageBucket])) {
                        $weightVectorMatrixOutput['ageBucket'][$user->ageBucket] += $user->likeStatus == 2 ? $like_wm_ageBucket : $dislike_wm_ageBucket;
                    } else {
                        $weightVectorMatrixOutput['ageBucket'][$user->ageBucket] = $user->likeStatus == 2 ? $like_wm_ageBucket : $dislike_wm_ageBucket;
                    }
                }

                // stature
                if (isset($user->stature)) {
                    if (isset($weightVectorMatrixOutput['stature'][$user->stature])) {
                        $weightVectorMatrixOutput['stature'][$user->stature] += $user->likeStatus == 2 ? $like_wm_stature : $dislike_wm_stature;
                    } else {
                        $weightVectorMatrixOutput['stature'][$user->stature] = $user->likeStatus == 2 ? $like_wm_stature : $dislike_wm_stature;
                    }
                }

                // bodyType
                if (isset($user->bodyTypeId)) {
                    if (isset($weightVectorMatrixOutput['bodyType'][$user->bodyTypeId])) {
                        $weightVectorMatrixOutput['bodyType'][$user->bodyTypeId] += $user->likeStatus == 2 ? $like_wm_bodyType : $dislike_wm_bodyType;
                    } else {
                        $weightVectorMatrixOutput['bodyType'][$user->bodyTypeId] = $user->likeStatus == 2 ? $like_wm_bodyType : $dislike_wm_bodyType;
                    }
                }
                // hairColour
                if (isset($user->hairColourId)) {
                    if (isset($weightVectorMatrixOutput['hairColour'][$user->hairColourId])) {
                        $weightVectorMatrixOutput['hairColour'][$user->hairColourId] += $user->likeStatus == 2 ? $like_wm_hairColour : $dislike_wm_hairColour;
                    } else {
                        $weightVectorMatrixOutput['hairColour'][$user->hairColourId] = $user->likeStatus == 2 ? $like_wm_hairColour : $dislike_wm_hairColour;
                    }
                }
                // eyeColour
                if (isset($user->eyeColourId)) {
                    if (isset($weightVectorMatrixOutput['eyeColour'][$user->eyeColourId])) {
                        $weightVectorMatrixOutput['eyeColour'][$user->eyeColourId] += $user->likeStatus == 2 ? $like_wm_eyeColour : $dislike_wm_eyeColour;
                    } else {
                        $weightVectorMatrixOutput['eyeColour'][$user->eyeColourId] = $user->likeStatus == 2 ? $like_wm_eyeColour : $dislike_wm_eyeColour;
                    }
                }
                // ethnicity
                if (isset($user->ethnicityId)) {
                    if (isset($weightVectorMatrixOutput['ethnicity'][$user->ethnicityId])) {
                        $weightVectorMatrixOutput['ethnicity'][$user->ethnicityId] += $user->likeStatus == 2 ? $like_wm_ethnicity : $dislike_wm_ethnicity;
                    } else {
                        $weightVectorMatrixOutput['ethnicity'][$user->ethnicityId] = $user->likeStatus == 2 ? $like_wm_ethnicity : $dislike_wm_ethnicity;
                    }
                }
                // smoke
                if (isset($user->smokingId)) {
                    if (isset($weightVectorMatrixOutput['smoking'][$user->smokingId])) {
                        $weightVectorMatrixOutput['smoking'][$user->smokingId] += $user->likeStatus == 2 ? $like_wm_smoking : $dislike_wm_smoking;
                    } else {
                        $weightVectorMatrixOutput['smoking'][$user->smokingId] = $user->likeStatus == 2 ? $like_wm_smoking : $dislike_wm_smoking;
                    }
                }
                // drink
                if (isset($user->drinkingId)) {
                    if (isset($weightVectorMatrixOutput['drinking'][$user->drinkingId])) {
                        $weightVectorMatrixOutput['drinking'][$user->drinkingId] += $user->likeStatus == 2 ? $like_wm_drinking : $dislike_wm_drink;
                    } else {
                        $weightVectorMatrixOutput['drinking'][$user->drinkingId] = $user->likeStatus == 2 ? $like_wm_drinking : $dislike_wm_drink;
                    }
                }
                // religion
                if (isset($user->religionId)) {
                    if (isset($weightVectorMatrixOutput['religion'][$user->religionId])) {
                        $weightVectorMatrixOutput['religion'][$user->religionId] += $user->likeStatus == 2 ? $like_wm_religion : $dislike_wm_religion;
                    } else {
                        $weightVectorMatrixOutput['religion'][$user->religionId] = $user->likeStatus == 2 ? $like_wm_religion : $dislike_wm_religion;
                    }
                }
                // leisureType
                if (isset($user->leisureId)) {
                    if (isset($weightVectorMatrixOutput['leisure'][$user->leisureId])) {
                        $weightVectorMatrixOutput['leisure'][$user->leisureId] += $user->likeStatus == 2 ? $like_wm_leisure : $dislike_wm_leisure;
                    } else {
                        $weightVectorMatrixOutput['leisure'][$user->leisureId] = $user->likeStatus == 2 ? $like_wm_leisure : $dislike_wm_leisure;
                    }
                }

                if (isset($user->personalityTypeId)) {
                    if (isset($weightVectorMatrixOutput['personalityType'][$user->personalityTypeId])) {
                        $weightVectorMatrixOutput['personalityType'][$user->personalityTypeId] += $user->likeStatus == 2 ? $like_wm_personalityType : $dislike_wm_personalityType;
                    } else {
                        $weightVectorMatrixOutput['personalityType'][$user->personalityTypeId] = $user->likeStatus == 2 ? $like_wm_personalityType : $dislike_wm_personalityType;
                    }
                }
            }
        }

        return $weightVectorMatrixOutput;
    }

    private function getPotentialMatches($id)
    {
        $userTargets = DB::table('users')
            ->select(
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
            ->where('users.id', '=', auth()->user()->id)
            ->first();

        $query = "SELECT
          users.id,
          users.genderId,
          users.countryId,
          users.verified,
          users.educationId,
          users.dob,
          users.height,
          users.bodyTypeId,
          users.hairColourId,
          users.eyeColourId,
          users.ethnicityId,
          users.smokingId,
          users.drinkingId,
          users.religionId,
          users.leisureId,
          users.personalityTypeId,
          matches.likeStatus,
          users.firstName,
          users.profilePicture,
          genders.genderName,
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
          personality_types.personalityTypeName
        FROM users
          LEFT JOIN genders ON users.genderId = genders.id
          LEFT JOIN countries ON users.countryId = countries.id
          LEFT JOIN education ON users.educationId = education.id
          LEFT JOIN body_types ON users.bodyTypeId = body_types.id
          LEFT JOIN hair_colours ON users.hairColourId = hair_colours.id
          LEFT JOIN eye_colours ON users.eyeColourId = eye_colours.id
          LEFT JOIN ethnicities ON users.ethnicityId = ethnicities.id
          LEFT JOIN smoking ON users.smokingId = smoking.id
          LEFT JOIN drinking ON users.drinkingId = drinking.id
          LEFT JOIN religions ON users.religionId = religions.id
          LEFT JOIN leisures ON users.leisureId = leisures.id
          LEFT JOIN personality_types ON users.personalityTypeId = personality_types.id
          LEFT JOIN matches ON users.id = matches.targetId
          AND matches.userId = " . $id .
            " WHERE users.id != " . $id .
            " AND (matches.likeStatus = 1 OR matches.likeStatus IS NULL)";

        if (isset($userTargets->targetGenderId)) {
            $query .= " AND users.genderId =" . $userTargets->targetGenderId;
        }

        if (isset($userTargets->targetMinAge)) {
            $query .= " AND users.dob <='" . Carbon::now()->subYears($userTargets->targetMinAge)->toDateString() . "'";
        }

        if (isset($userTargets->targetMaxAge)) {
            $query .= " AND users.dob >='" . Carbon::now()->subYears($userTargets->targetMaxAge + 1)->toDateString() . "'";
        }

        if (isset($userTargets->targetMinHeight)) {
            $query .= " AND users.Height >=" . $userTargets->targetMinHeight;
        }

        if (isset($userTargets->targetMaxHeight)) {
            $query .= " AND users.Height <=" . $userTargets->targetMaxHeight;
        }

        if (isset($userTargets->targetBodyTypeId)) {
            $query .= " AND users.BodyTypeId =" . $userTargets->targetBodyTypeId;
        }

        if (isset($userTargets->targetReligionId)) {
            $query .= " AND users.ReligionId =" . $userTargets->targetReligionId;
        }

        if (isset($userTargets->targetCountryId)) {
            $query .= " AND users.CountryId =" . $userTargets->targetCountryId;
        }

        if (isset($userTargets->targetEthnicityId)) {
            $query .= " AND users.EthnicityId =" . $userTargets->targetEthnicityId;
        }

        if (isset($userTargets->targetHairColourId)) {
            $query .= " AND users.HairColourId =" . $userTargets->targetHairColourId;
        }

        if (isset($userTargets->targetEyeColourId)) {
            $query .= " AND users.EyeColourId =" . $userTargets->targetEyeColourId;
        }

        if (isset($userTargets->targetEducationId)) {
            $query .= " AND users.EducationId =" . $userTargets->targetEducationId;
        }

        if (isset($userTargets->targetDrinkingId)) {
            $query .= " AND users.DrinkingId =" . $userTargets->targetDrinkingId;
        }

        if (isset($userTargets->targetSmokingId)) {
            $query .= " AND users.SmokingId =" . $userTargets->targetSmokingId;
        }

        if (isset($userTargets->targetLeisureId)) {
            $query .= " AND users.LeisureId =" . $userTargets->targetLeisureId;
        }

        if (isset($userTargets->targetPersonalityTypeId)) {
            $query .= " AND users.PersonalityTypeId =" . $userTargets->targetPersonalityTypeId;
        }


        $potentialMatches = DB::select($query);
        foreach ($potentialMatches as $potentialMatch) {
            // create age from dob response
            if ($potentialMatch->dob) {
                $potentialMatch->age = $this->getAge($potentialMatch->dob);
                // add age bucket
                if ($potentialMatch->age <= 25) {
                    $potentialMatch->ageBucket = "age18To25";
                } elseif ($potentialMatch->age <= 35) {
                    $potentialMatch->ageBucket = "age26To35";
                } elseif ($potentialMatch->age <= 45) {
                    $potentialMatch->ageBucket = "age36To45";
                } else {
                    $potentialMatch->ageBucket = "age46To";
                }
            }
            // add stature
            if ($potentialMatch->height) {
                if ($potentialMatch->height < 160) {
                    $potentialMatch->stature = "Short";
                } elseif ($potentialMatch->height <= 180) {
                    $potentialMatch->stature = "Average";
                } elseif ($potentialMatch->height > 180) {
                    $potentialMatch->stature = "Tall";
                }
            }
            $potentialMatch->likeStatus = 1;
        }
        return $potentialMatches;
    }

    private function sortMatches($potentialMatches, $weightVectorMatrix)
    {
        foreach ($potentialMatches as $user) {
            $user->score = 0.0;
            if (isset($user->genderId)) {
                if (isset($weightVectorMatrix['gender'][$user->genderId])) {
                    $user->score += $weightVectorMatrix['gender'][$user->genderId];
                }
            }

            if (isset($user->countryId)) {
                if (isset($weightVectorMatrix['country'][$user->countryId])) {
                    $user->score += $weightVectorMatrix['country'][$user->countryId];
                }
            }

            if (isset($user->verified)) {
                if (isset($weightVectorMatrix['verified'][$user->verified])) {
                    $user->score += $weightVectorMatrix['verified'][$user->verified];
                }
            }

            if (isset($user->educationId)) {
                if (isset($weightVectorMatrix['education'][$user->educationId])) {
                    $user->score += $weightVectorMatrix['education'][$user->educationId];
                }
            }

            if (isset($user->stature)) {
                if (isset($weightVectorMatrix['stature'][$user->stature])) {
                    $user->score += $weightVectorMatrix['stature'][$user->stature];
                }
            }

            if (isset($user->bodyTypeId)) {
                if (isset($weightVectorMatrix['bodyType'][$user->bodyTypeId])) {
                    $user->score += $weightVectorMatrix['bodyType'][$user->bodyTypeId];
                }
            }

            if (isset($user->hairColourId)) {
                if (isset($weightVectorMatrix['hairColour'][$user->hairColourId])) {
                    $user->score += $weightVectorMatrix['hairColour'][$user->hairColourId];
                }
            }

            if (isset($user->eyeColourId)) {
                if (isset($weightVectorMatrix['eyeColour'][$user->eyeColourId])) {
                    $user->score += $weightVectorMatrix['eyeColour'][$user->eyeColourId];
                }
            }

            if (isset($user->ethnicityId)) {
                if (isset($weightVectorMatrix['ethnicity'][$user->ethnicityId])) {
                    $user->score += $weightVectorMatrix['ethnicity'][$user->ethnicityId];
                }
            }

            if (isset($user->smokingId)) {
                if (isset($weightVectorMatrix['smoking'][$user->smokingId])) {
                    $user->score += $weightVectorMatrix['smoking'][$user->smokingId];
                }
            }

            if (isset($user->drinkingId)) {
                if (isset($weightVectorMatrix['drinking'][$user->drinkingId])) {
                    $user->score += $weightVectorMatrix['drinking'][$user->drinkingId];
                }
            }

            if (isset($user->religionId)) {
                if (isset($weightVectorMatrix['religion'][$user->religionId])) {
                    $user->score += $weightVectorMatrix['religion'][$user->religionId];
                }
            }

            if (isset($user->leisureId)) {
                if (isset($weightVectorMatrix['leisure'][$user->leisureId])) {
                    $user->score += $weightVectorMatrix['leisure'][$user->leisureId];
                }
            }

            if (isset($user->personalityTypeId)) {
                if (isset($weightVectorMatrix['personalityType'][$user->personalityTypeId])) {
                    $user->score += $weightVectorMatrix['personalityType'][$user->personalityTypeId];
                }
            }

            if (isset($user->ageBucket)) {
                if (isset($weightVectorMatrix['ageBucket'][$user->ageBucket])) {
                    $user->score += $weightVectorMatrix['ageBucket'][$user->ageBucket];
                }
            }
        }


        uasort($potentialMatches, function ($user1, $user2) {
            return $user2->score <=> $user1->score;
        });

        return $potentialMatches;
    }

}
