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

        $potentialMatches = DB::table('users');

        $potentialMatches->where('users.id', '<>', $id);

        if ($userTargets->targetGenderId) {
            $potentialMatches
                ->where('users.genderId', '=', $userTargets->targetGenderId);
        }

        if ($userTargets->targetMinAge) {
            $potentialMatches
                ->where('users.dob', '<', date('YYYY-mm-dd', strtotime($userTargets->targetMinAge . "year")));
        }

        if ($userTargets->targetMaxAge) {
            $potentialMatches
                ->where('users.dob', '>', date('YYYY-mm-dd', strtotime($userTargets->targetMaxAge . "year")));
        }

        if ($userTargets->targetMinHeight) {
            $potentialMatches
                ->where('users.Height', '>=', $userTargets->targetMinHeight);
        }

        if ($userTargets->targetMaxHeight) {
            $potentialMatches
                ->where('users.Height', '<=', $userTargets->targetMaxHeight);
        }

        if ($userTargets->targetBodyTypeId) {
            $potentialMatches
                ->where('users.BodyTypeId', '=', $userTargets->targetBodyTypeId);
        }

        if ($userTargets->targetReligionId) {
            $potentialMatches
                ->where('users.ReligionId', '=', $userTargets->targetReligionId);
        }

        if ($userTargets->targetCountryId) {
            $potentialMatches
                ->where('users.CountryId', '=', $userTargets->targetCountryId);
        }

        if ($userTargets->targetEthnicityId) {
            $potentialMatches
                ->where('users.EthnicityId', '=', $userTargets->targetEthnicityId);
        }

        if ($userTargets->targetHairColourId) {
            $potentialMatches
                ->where('users.HairColourId', '=', $userTargets->targetHairColourId);
        }

        if ($userTargets->targetEyeColourId) {
            $potentialMatches
                ->where('users.EyeColourId', '=', $userTargets->targetEyeColourId);
        }

        if ($userTargets->targetEducationId) {
            $potentialMatches
                ->where('users.EducationId', '=', $userTargets->targetEducationId);
        }

        if ($userTargets->targetDrinkingId) {
            $potentialMatches
                ->where('users.DrinkingId', '=', $userTargets->targetDrinkingId);
        }

        if ($userTargets->targetSmokingId) {
            $potentialMatches
                ->where('users.SmokingId', '=', $userTargets->targetSmokingId);
        }

        if ($userTargets->targetLeisureId) {
            $potentialMatches
                ->where('users.LeisureId', '=', $userTargets->targetLeisureId);
        }

        if ($userTargets->targetPersonalityTypeId) {
            $potentialMatches
                ->where('users.PersonalityTypeId', '=', $userTargets->targetPersonalityTypeId);
        }


        $potentialMatches
            ->leftJoin('genders', 'users.genderId', '=', 'genders.id')
            ->leftJoin('countries', 'users.countryId', '=', 'countries.id')
            ->leftJoin('education', 'users.educationId', '=', 'education.id')
            ->leftJoin('body_types', 'users.bodyTypeId', '=', 'body_types.id')
            ->leftJoin('hair_colours', 'users.hairColourId', '=', 'hair_colours.id')
            ->leftJoin('eye_colours', 'users.eyeColourId', '=', 'eye_colours.id')
            ->leftJoin('ethnicities', 'users.ethnicityId', '=', 'ethnicities.id')
            ->leftJoin('smoking', 'users.smokingId', '=', 'smoking.id')
            ->leftJoin('drinking', 'users.drinkingId', '=', 'drinking.id')
            ->leftJoin('religions', 'users.religionId', '=', 'religions.id')
            ->leftJoin('leisures', 'users.leisureId', '=', 'leisures.id')
            ->leftJoin('personality_types', 'users.personalityTypeId', '=', 'personality_types.id')
            ->select(
                [
                    'users.id as id',
                    'genders.genderName as gender',
                    'countries.countryName as country',
                    'verified as verified',
                    'educationName as education',
                    'users.dob as dob',
                    'users.height as height',
                    'body_types.bodyTypeName as bodyType',
                    'hair_colours.hairColourName as hairColour',
                    'eye_colours.eyeColourName as eyeColour',
                    'ethnicities.ethnicityName as ethnicity',
                    'smoking.smokingPrefName as smoking',
                    'drinking.drinkingPrefName as drinking',
                    'religions.religionName as religion',
                    'leisures.leisureName as leisureName',
                    'personality_types.personalityTypeName as personalityTypeName'
                ]
            );
        if ($request->query('random') == 1) {
            $potentialMatches->inRandomOrder();
        }
        if($request->query('offset')) {
            $potentialMatches->offset($request->query('offset'));
        }
        if($request->query('results')) {
            $potentialMatches->limit($request->query('results'));
        } else {
            $potentialMatches->limit(100);
        }

        $potentialMatches = $potentialMatches->get();
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

            if (isset($potentialMatch->leisureName)) {
                $potentialMatch->leisureName = $this->removeSpaceAndCamelCase($potentialMatch->leisureName);
            } else {
                $potentialMatch->leisureName = null;
            }

            if (isset($potentialMatch->personalityTypeName)) {
                $potentialMatch->personalityTypeName = $this->removeSpaceAndCamelCase($potentialMatch->personalityTypeName);
            } else {
                $potentialMatch->personalityTypeName = null;
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
