<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class WeightVectorMatrixController extends Controller
{

    /**
     * Display a listing of the resource for the specific user id.
     *
     * @return \Illuminate\Http\Response
     *
     * almost with following format:
     *   {
     * gender: {
     * female: 2
     * },
     * country: {
     * australia: 2
     * },
     * verified: {
     * true: 0.9
     * },
     * education: {
     * highSchool: 0.8
     * },
     * minHeight: {
     * 150: 0.9
     * },
     * maxHeight: {
     * 160: 0.8
     * },
     * minAge: {
     * 25: 0.8
     * },
     * maxAge: {
     * 40: 1
     * },
     * bodyType: {
     * slim: 1.4
     * },
     * hairColour: {
     * red: 0.5
     * },
     * eyeColour: {
     * blue: 0.5
     * },
     * ethnicity: {
     * african: 0.8
     * },
     * smoke: {
     * rarely: 1.4
     * },
     * drink: {
     * socially: 1.4
     * },
     * religion: {
     * atheist: 0.8
     * },
     *   }
     */

    public function show($id)
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
            "smoke" => array(),
            "drink" => array(),
            "religion" => array(),
        );

        $constraints = DB::table('users')
            ->where('id', $id)
            ->select([
                'users.targetMinAge as minAge',
                'users.targetMaxAge as maxAge',
                'users.targetMinHeight as minHeight',
                'users.targetMaxHeight as maxHeight',
            ])
            ->first();

        $weightVectorMatrixOutput['minAge'] = $constraints->minAge;
        $weightVectorMatrixOutput['maxAge'] = $constraints->maxAge;
        $weightVectorMatrixOutput['minHeight'] = $constraints->minHeight;
        $weightVectorMatrixOutput['maxHeight'] = $constraints->maxHeight;

        // Like Weight multiplier
        $like_wm_gender = 1.0;
        $like_wm_country = 1.0;
        $like_wm_verified = 0.9;
        $like_wm_education = 0.8;
        $like_wm_ageBucket = 0.9;
        $like_wm_minAge = 0.8;
        $like_wm_maxAge = 1.0;
        $like_wm_stature = 0.85;
        $like_wm_minHeight = 0.9;
        $like_wm_maxHeight = 0.8;
        $like_wm_bodyType = 0.7;
        $like_wm_hairColour = 0.5;
        $like_wm_eyeColour = 0.5;
        $like_wm_ethnicity = 0.8;
        $like_wm_smoke = 0.7;
        $like_wm_drink = 0.7;
        $like_wm_religion = 0.8;

        // DisLike Weight multiplier
        $dislike_wm_gender = 1.0;
        $dislike_wm_country = 1.0;
        $dislike_wm_verified = 0.9;
        $dislike_wm_education = 0.8;
        $dislike_wm_ageBucket = 0.9;
        $dislike_wm_minAge = 0.8;
        $dislike_wm_maxAge = 1.0;
        $dislike_wm_stature = 0.85;
        $dislike_wm_minHeight = 0.9;
        $dislike_wm_maxHeight = 0.8;
        $dislike_wm_bodyType = 0.7;
        $dislike_wm_hairColour = 0.5;
        $dislike_wm_eyeColour = 0.5;
        $dislike_wm_ethnicity = 0.8;
        $dislike_wm_smoke = 0.7;
        $dislike_wm_drink = 0.7;
        $dislike_wm_religion = 0.8;

        $likedOrDislikedUsers = DB::table('matches')
            ->where('userId', $id)
            ->where('matches.likeStatus', '<>', '1')
            ->leftJoin('users', 'matches.targetId', '=', 'users.id')
            ->leftJoin('genders', 'users.genderId', '=', 'genders.id')
            ->leftJoin('countries', 'users.countryId', '=', 'countries.id')
            ->leftJoin('education', 'users.educationId', '=', 'education.id')
            ->leftJoin('body_types', 'users.bodyTypeId', '=', 'body_types.id')
            ->leftJoin('eye_colours', 'users.eyeColourId', '=', 'eye_colours.id')
            ->leftJoin('hair_colours', 'users.hairColourId', '=', 'hair_colours.id')
            ->leftJoin('ethnicities', 'users.ethnicityId', '=', 'ethnicities.id')
            ->leftJoin('smoking', 'users.smokingId', '=', 'smoking.id')
            ->leftJoin('drinking', 'users.drinkingId', '=', 'drinking.id')
            ->leftJoin('religions', 'users.religionId', '=', 'religions.id')
            ->select([
                'matches.targetId as id',
                'genders.genderName as gender',
                'countries.countryName as country',
                'users.verified as verified',
                'education.educationName as education',
                'users.dob as dob',
                'users.height as height',
                'body_types.bodyTypeName as bodyType',
                'hair_colours.hairColourName as hairColour',
                'eye_colours.eyeColourName as eyeColour',
                'ethnicities.ethnicityName as ethnicity',
                'smoking.smokingPrefName as smoke',
                'drinking.drinkingPrefName as drink',
                'religions.religionName as religion',
                'matches.likeStatus as likeStatus'
            ])
            ->get();

        foreach ($likedOrDislikedUsers as $user) {


            // update string responses
            $user->gender = $this->removeSpaceAndCamelCase($user->gender);
            $user->country = $this->removeSpaceAndCamelCase($user->country);
            $user->education = $this->removeSpaceAndCamelCase($user->education);
            $user->bodyType = $this->removeSpaceAndCamelCase($user->bodyType);
            $user->hairColour = $this->removeSpaceAndCamelCase($user->hairColour);
            $user->eyeColour = $this->removeSpaceAndCamelCase($user->eyeColour);
            $user->ethnicity = $this->removeSpaceAndCamelCase($user->ethnicity);
            $user->smoke = $this->removeSpaceAndCamelCase($user->smoke);
            $user->drink = $this->removeSpaceAndCamelCase($user->drink);
            $user->religion = $this->removeSpaceAndCamelCase($user->religion);

            // create age from dob response and add age bucket
            if (isset($user->dob)) {
                $user->age = $this->getAge($user->dob);
                if (isset($user->age) <= 25) {
                    $user->ageBucket = "age18To25";
                } elseif (isset($user->age) <= 35) {
                    $user->ageBucket = "age26To35";
                } elseif (isset($user->age) <= 45) {
                    $user->ageBucket = "age36To45";
                } else {
                    $user->ageBucket = "age46To";
                }
            }
            // add stature
            if (isset($user->height)) {
                if (isset($user->height) < 160) {
                    $user->stature = "short";
                } elseif (isset($user->height) <= 180) {
                    $user->stature = "average";
                } elseif (isset($user->height) > 180) {
                    $user->stature = "tall";
                }
            }

            if (isset($user->likeStatus)) { // like
                // set outputMatrix
                // gender
                if (isset($user->gender)) {
                    if (isset($weightVectorMatrixOutput['gender'][$user->gender])) {
                        $weightVectorMatrixOutput['gender'][$user->gender] += $like_wm_gender;
                    } else {
                        $weightVectorMatrixOutput['gender'][$user->gender] = $like_wm_gender;
                    }
                }
                // country
                if (isset($user->country)) {
                    if (isset($weightVectorMatrixOutput['country'][$user->country])) {
                        $weightVectorMatrixOutput['country'][$user->country] += $like_wm_country;
                    } else {
                        $weightVectorMatrixOutput['country'][$user->country] = $like_wm_country;
                    }
                }
                // verified
                if (isset($user->verified)) {
                    if (isset($weightVectorMatrixOutput['verified'][$user->verified])) {
                        $weightVectorMatrixOutput['verified'][$user->verified] += $like_wm_verified;
                    } else {
                        $weightVectorMatrixOutput['verified'][$user->verified] = $like_wm_verified;
                    }
                }
                // education
                if (isset($user->education)) {
                    if (isset($weightVectorMatrixOutput['education'][$user->education])) {
                        $weightVectorMatrixOutput['education'][$user->education] += $like_wm_education;
                    } else {
                        $weightVectorMatrixOutput['education'][$user->education] = $like_wm_education;
                    }
                }

                // ageBucket
                if (isset($user->ageBucket)) {
                    if (isset($weightVectorMatrixOutput['ageBucket'][$user->ageBucket])) {
                        $weightVectorMatrixOutput['ageBucket'][$user->ageBucket] += $like_wm_ageBucket;
                    } else {
                        $weightVectorMatrixOutput['ageBucket'][$user->ageBucket] = $like_wm_ageBucket;
                    }
                }
                // minAge
                // maxAge
                // stature
                if (isset($user->stature)) {
                    if (isset($weightVectorMatrixOutput['stature'][$user->stature])) {
                        $weightVectorMatrixOutput['stature'][$user->stature] += $like_wm_stature;
                    } else {
                        $weightVectorMatrixOutput['stature'][$user->stature] = $like_wm_stature;
                    }
                }

                // minHeight
                // maxHeight
                // bodyType
                if (isset($user->bodyType)) {
                    if (isset($weightVectorMatrixOutput['bodyType'][$user->bodyType])) {
                        $weightVectorMatrixOutput['bodyType'][$user->bodyType] += $like_wm_bodyType;
                    } else {
                        $weightVectorMatrixOutput['bodyType'][$user->bodyType] = $like_wm_bodyType;
                    }
                }
                // hairColour
                if (isset($user->hairColour)) {
                    if (isset($weightVectorMatrixOutput['hairColour'][$user->hairColour])) {
                        $weightVectorMatrixOutput['hairColour'][$user->hairColour] += $like_wm_hairColour;
                    } else {
                        $weightVectorMatrixOutput['hairColour'][$user->hairColour] = $like_wm_hairColour;
                    }
                }
                // eyeColour
                if (isset($user->eyeColour)) {
                    if (isset($weightVectorMatrixOutput['eyeColour'][$user->eyeColour])) {
                        $weightVectorMatrixOutput['eyeColour'][$user->eyeColour] += $like_wm_eyeColour;
                    } else {
                        $weightVectorMatrixOutput['eyeColour'][$user->eyeColour] = $like_wm_eyeColour;
                    }
                }
                // ethnicity
                if (isset($user->ethnicity)) {
                    if (isset($weightVectorMatrixOutput['ethnicity'][$user->ethnicity])) {
                        $weightVectorMatrixOutput['ethnicity'][$user->ethnicity] += $like_wm_ethnicity;
                    } else {
                        $weightVectorMatrixOutput['ethnicity'][$user->ethnicity] = $like_wm_ethnicity;
                    }
                }
                // smoke
                if (isset($user->smoke)) {
                    if (isset($weightVectorMatrixOutput['smoke'][$user->smoke])) {
                        $weightVectorMatrixOutput['smoke'][$user->smoke] += $like_wm_smoke;
                    } else {
                        $weightVectorMatrixOutput['smoke'][$user->smoke] = $like_wm_smoke;
                    }
                }
                // drink
                if (isset($user->bodyType)) {
                    if (isset($weightVectorMatrixOutput['drink'][$user->drink])) {
                        $weightVectorMatrixOutput['drink'][$user->drink] += $like_wm_drink;
                    } else {
                        $weightVectorMatrixOutput['drink'][$user->drink] = $like_wm_drink;
                    }
                }
                // religion
                if (isset($user->religion)) {
                    if (isset($weightVectorMatrixOutput['religion'][$user->religion])) {
                        $weightVectorMatrixOutput['religion'][$user->religion] += $like_wm_religion;
                    } else {
                        $weightVectorMatrixOutput['religion'][$user->religion] = $like_wm_religion;
                    }
                }

            }
        }

        return json_encode($weightVectorMatrixOutput);

    }

    private
    function removeSpaceAndCamelCase($word)
    {
        return lcfirst(preg_replace('/[^A-Za-z]/', '', $word));
    }

    private
    function getAge($dob)
    {
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }
}