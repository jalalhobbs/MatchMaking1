<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PotentialMatchController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     * with following format:
     *   {
     *      gender: female,
     *      country: australia,
     *      verified: no,
     *      education: certificate,
     *      age: 30,
     *      stature: average,
     *      height: 234,
     *      bodyType: wellPadded,
     *      hairColor: red,
     *      eyeColor: brown,
     *      ethnicity: pacificIslander,
     *      smoke: no,
     *      drink: yes,
     *      religion: sikh,
     *   }
     */
    public function index()
    {
        return "not implemented";
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     *
     * with following format:
     *   {
     *      gender: female,
     *      country: australia,
     *      verified: no,
     *      education: certificate,
     *      age: 30,
     *      stature: average,
     *      height: 234,
     *      bodyType: wellPadded,
     *      hairColor: red,
     *      eyeColor: brown,
     *      ethnicity: pacificIslander,
     *      smoke: no,
     *      drink: yes,
     *      religion: sikh,
     *   }
     */
    public function show($id, Request $request)
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
            )->where('users.id', '=', $id)
            ->first();

        $query = "SELECT
          users.id                              as id,
          users.firstName                       as firstName,
          genders.genderName                    as gender,
          genders.genderName                    as genderDisplay,
          countries.countryName                 as country,
          verified                              as verified,
          educationName                         as education,
          users.dob                             as dob,
          users.height                          as height,
          body_types.bodyTypeName               as bodyType,
          body_types.bodyTypeName               as bodyTypeDisplay,
          hair_colours.hairColourName           as hairColour,
          eye_colours.eyeColourName             as eyeColour,
          ethnicities.ethnicityName             as ethnicity,
          smoking.smokingPrefName               as smoking,
          drinking.drinkingPrefName             as drinking,
          religions.religionName                as religion,
          leisures.leisureName                  as leisure,
          personality_types.personalityTypeName as personalityType,
          users.profilePicture                  as profilePictureUrl,
          matches.likeStatus                    as likeStatus
          
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

        if ($userTargets->targetGenderId) {
            $query .= " AND users.genderId =" . $userTargets->targetGenderId;
        }

        if ($userTargets->targetMinAge) {
            $query .= " AND users.dob <='" . Carbon::now()->subYears($userTargets->targetMinAge)->toDateString() . "'";
        }

        if ($userTargets->targetMaxAge) {
            $query .= " AND users.dob >='" . Carbon::now()->subYears($userTargets->targetMaxAge+1)->toDateString() . "'";
        }

        if ($userTargets->targetMinHeight) {
            $query .= " AND users.Height >=" . $userTargets->targetMinHeight;
        }

        if ($userTargets->targetMaxHeight) {
            $query .= " AND users.Height <=" . $userTargets->targetMaxHeight;
        }

        if ($userTargets->targetBodyTypeId) {
            $query .= " AND users.BodyTypeId =" . $userTargets->targetBodyTypeId;
        }

        if ($userTargets->targetReligionId) {
            $query .= " AND users.ReligionId =" . $userTargets->targetReligionId;
        }

        if ($userTargets->targetCountryId) {
            $query .= " AND users.CountryId =" . $userTargets->targetCountryId;
        }

        if ($userTargets->targetEthnicityId) {
            $query .= " AND users.EthnicityId =" . $userTargets->targetEthnicityId;
        }

        if ($userTargets->targetHairColourId) {
            $query .= " AND users.HairColourId =" . $userTargets->targetHairColourId;
        }

        if ($userTargets->targetEyeColourId) {
            $query .= " AND users.EyeColourId =" . $userTargets->targetEyeColourId;
        }

        if ($userTargets->targetEducationId) {
            $query .= " AND users.EducationId =" . $userTargets->targetEducationId;
        }

        if ($userTargets->targetDrinkingId) {
            $query .= " AND users.DrinkingId =" . $userTargets->targetDrinkingId;
        }

        if ($userTargets->targetSmokingId) {
            $query .= " AND users.SmokingId =" . $userTargets->targetSmokingId;
        }

        if ($userTargets->targetLeisureId) {
            $query .= " AND users.LeisureId =" . $userTargets->targetLeisureId;
        }

        if ($userTargets->targetPersonalityTypeId) {
            $query .= " AND users.PersonalityTypeId =" . $userTargets->targetPersonalityTypeId;
        }

//        $potentialMatches->leftJoin('matches', 'users.id', '=', $id);
//        ->where('matches.likeStatus', '<>', '0');

        if ($request->query('limit')) {
            $query .= " LIMIT " . $request->query('limit');
        } else {
            $query .= " LIMIT 100";
        }
        if ($request->query('offset')) {
            $query .= " OFFSET " . $request->query('offset');
        }
        $potentialMatches = DB::select($query);
        foreach ($potentialMatches as $potentialMatch) {


            // update string responses
            if (isset($potentialMatch->gender)) {
                $potentialMatch->gender = $this->removeSpaceAndCamelCase($potentialMatch->gender);
            } else {
                $potentialMatch->gender = null;
            }

            if (isset($potentialMatch->country)) {
                $potentialMatch->country = $this->removeSpaceAndCamelCase($potentialMatch->country);
            } else {
                $potentialMatch->country = null;
            }

            if (isset($potentialMatch->education)) {
                $potentialMatch->education = $this->removeSpaceAndCamelCase($potentialMatch->education);
            } else {
                $potentialMatch->education = null;
            }

            if (isset($potentialMatch->bodyType)) {
                $potentialMatch->bodyType = $this->removeSpaceAndCamelCase($potentialMatch->bodyType);
            } else {
                $potentialMatch->bodyType = null;
            }

            if (isset($potentialMatch->hairColour)) {
                $potentialMatch->hairColour = $this->removeSpaceAndCamelCase($potentialMatch->hairColour);
            } else {
                $potentialMatch->hairColour = null;
            }

            if (isset($potentialMatch->eyeColour)) {
                $potentialMatch->eyeColour = $this->removeSpaceAndCamelCase($potentialMatch->eyeColour);
            } else {
                $potentialMatch->eyeColour = null;
            }

            if (isset($potentialMatch->ethnicity)) {
                $potentialMatch->ethnicity = $this->removeSpaceAndCamelCase($potentialMatch->ethnicity);
            } else {
                $potentialMatch->ethnicity = null;
            }

            if (isset($potentialMatch->smoking)) {
                $potentialMatch->smoking = $this->removeSpaceAndCamelCase($potentialMatch->smoking);
            } else {
                $potentialMatch->smoking = null;
            }

            if (isset($potentialMatch->drinking)) {
                $potentialMatch->drinking = $this->removeSpaceAndCamelCase($potentialMatch->drinking);
            } else {
                $potentialMatch->drinking = null;
            }

            if (isset($potentialMatch->religion)) {
                $potentialMatch->religion = $this->removeSpaceAndCamelCase($potentialMatch->religion);
            } else {
                $potentialMatch->religion = null;
            }

            if (isset($potentialMatch->leisure)) {
                $potentialMatch->leisure = $this->removeSpaceAndCamelCase($potentialMatch->leisure);
            } else {
                $potentialMatch->leisure = null;
            }

            if (isset($potentialMatch->personalityType)) {
                $potentialMatch->personalityType = $this->removeSpaceAndCamelCase($potentialMatch->personalityType);
            } else {
                $potentialMatch->personalityType = null;
            }

            // create age from dob response
            if ($potentialMatch->dob) {
                $potentialMatch->age = $this->getAge($potentialMatch->dob);
                // remove dob from array
                unset($potentialMatch->dob);
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
            } else {
                $potentialMatch->age = null;
            }
            // add stature
            if ($potentialMatch->height) {
                if ($potentialMatch->height < 160) {
                    $potentialMatch->stature = "short";
                } elseif ($potentialMatch->height <= 180) {
                    $potentialMatch->stature = "average";
                } elseif ($potentialMatch->height > 180) {
                    $potentialMatch->stature = "tall";
                }
            } else {
                $potentialMatch->stature = null;
            }
        }
        return json_encode($potentialMatches);
    }

    private function removeSpaceAndCamelCase($word)
    {
        return lcfirst(preg_replace('/[^A-Za-z]/', '', $word));
    }

    private function getAge($dob)
    {
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }


}
