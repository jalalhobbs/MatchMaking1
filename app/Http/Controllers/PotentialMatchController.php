<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        if (true) {
            $potentialMatches = DB::table('users')
                ->select(
                    [
                        'users.id as id',
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
                        'religions.religionName as religion'
                    ]
                )
                ->leftJoin('countries', 'users.countryId', '=', 'countries.id')
                ->leftJoin('education', 'users.educationId', '=', 'education.id')
                ->leftJoin('body_types', 'users.bodyTypeId', '=', 'body_types.id')
                ->leftJoin('hair_colours', 'users.hairColourId', '=', 'hair_colours.id')
                ->leftJoin('eye_colours', 'users.eyeColourId', '=', 'eye_colours.id')
                ->leftJoin('ethnicities', 'users.ethnicityId', '=', 'ethnicities.id')
                ->leftJoin('smoking', 'users.smokingId', '=', 'smoking.id')
                ->leftJoin('drinking', 'users.drinkingId', '=', 'drinking.id')
                ->leftJoin('religions', 'users.religionId', '=', 'religions.id')
                ->get();
            foreach ($potentialMatches as $potentialMatch) {


                // update string responses
                $potentialMatch->country = $this->removeSpaceAndCamelCase($potentialMatch->country);
                $potentialMatch->education = $this->removeSpaceAndCamelCase($potentialMatch->education);
                $potentialMatch->bodyType = $this->removeSpaceAndCamelCase($potentialMatch->bodyType);
                $potentialMatch->hairColour = $this->removeSpaceAndCamelCase($potentialMatch->hairColour);
                $potentialMatch->eyeColour = $this->removeSpaceAndCamelCase($potentialMatch->eyeColour);
                $potentialMatch->ethnicity = $this->removeSpaceAndCamelCase($potentialMatch->ethnicity);
                $potentialMatch->smoking = $this->removeSpaceAndCamelCase($potentialMatch->smoking);
                $potentialMatch->drinking = $this->removeSpaceAndCamelCase($potentialMatch->drinking);
                $potentialMatch->religion = $this->removeSpaceAndCamelCase($potentialMatch->religion);

                // create age from dob response
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

                // add stature
                if ($potentialMatch->height < 160) {
                    $potentialMatch->stature = "short";
                } elseif ($potentialMatch->height <= 180) {
                    $potentialMatch->stature = "average";
                } elseif ($potentialMatch->height > 180) {
                    $potentialMatch->stature = "tall";
                } else {
                    $potentialMatch->stature = "undisclosed";
                }
            }
            return json_encode($potentialMatches);
        } else {
            return "Not authorized";
        }
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
    public function show($id)
    {
        $potentialMatch = DB::table('users')->where('users.id', '=', $id)
            ->select(
                [
                    'users.id as id',
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
                    'religions.religionName as religion'
                ]
            )
            ->leftJoin('countries', 'users.countryId', '=', 'countries.id')
            ->leftJoin('education', 'users.educationId', '=', 'education.id')
            ->leftJoin('body_types', 'users.bodyTypeId', '=', 'body_types.id')
            ->leftJoin('hair_colours', 'users.hairColourId', '=', 'hair_colours.id')
            ->leftJoin('eye_colours', 'users.eyeColourId', '=', 'eye_colours.id')
            ->leftJoin('ethnicities', 'users.ethnicityId', '=', 'ethnicities.id')
            ->leftJoin('smoking', 'users.smokingId', '=', 'smoking.id')
            ->leftJoin('drinking', 'users.drinkingId', '=', 'drinking.id')
            ->leftJoin('religions', 'users.religionId', '=', 'religions.id')
            ->get();

        // update string responses
        $potentialMatch[0]->country = $this->removeSpaceAndCamelCase($potentialMatch[0]->country);
        $potentialMatch[0]->education = $this->removeSpaceAndCamelCase($potentialMatch[0]->education);
        $potentialMatch[0]->bodyType = $this->removeSpaceAndCamelCase($potentialMatch[0]->bodyType);
        $potentialMatch[0]->hairColour = $this->removeSpaceAndCamelCase($potentialMatch[0]->hairColour);
        $potentialMatch[0]->eyeColour = $this->removeSpaceAndCamelCase($potentialMatch[0]->eyeColour);
        $potentialMatch[0]->ethnicity = $this->removeSpaceAndCamelCase($potentialMatch[0]->ethnicity);
        $potentialMatch[0]->smoking = $this->removeSpaceAndCamelCase($potentialMatch[0]->smoking);
        $potentialMatch[0]->drinking = $this->removeSpaceAndCamelCase($potentialMatch[0]->drinking);
        $potentialMatch[0]->religion = $this->removeSpaceAndCamelCase($potentialMatch[0]->religion);

        // create age from dob response
        $potentialMatch[0]->age = $this->getAge($potentialMatch[0]->dob);
        // remove dob from array
        unset($potentialMatch[0]->dob);
        // add age bucket
        if ($potentialMatch[0]->age <= 25) {
            $potentialMatch[0]->ageBucket = "age18To25";
        } elseif ($potentialMatch[0]->age <= 35) {
            $potentialMatch[0]->ageBucket = "age26To35";
        } elseif ($potentialMatch[0]->age <= 45) {
            $potentialMatch[0]->ageBucket = "age36To45";
        } else {
            $potentialMatch[0]->ageBucket = "age46To";
        }

        // add stature
        if ($potentialMatch[0]->height < 160) {
            $potentialMatch[0]->stature = "short";
        } elseif ($potentialMatch[0]->height <= 180) {
            $potentialMatch[0]->stature = "average";
        } elseif ($potentialMatch[0]->height > 180) {
            $potentialMatch[0]->stature = "tall";
        } else {
            $potentialMatch[0]->stature = "undisclosed";
        }

        return json_encode($potentialMatch[0]);
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
