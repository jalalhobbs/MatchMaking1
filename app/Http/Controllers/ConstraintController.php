<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class ConstraintController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Typing public/profile will bring you to the profile.edit page if you are logged in
        // If youre not logged in the middleware will kick you out to the login screen.
        return redirect(route('looking-for.edit', [auth()->user()->id]));
        //https://stackoverflow.com/questions/36276634/laravel-5-redirect-to-controller-actions

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Functionality Disabled by routes page
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Functionality Disabled by routes page
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Functionality Disabled by routes page
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->user()->id == $id) {
            $user = DB::table('users')->where('id', auth()->user()->id)->first();
            $religions = DB::table('religions')->get();
            $genders = DB::table('genders')->get();
            $bodyTypes = DB::table('body_types')->get();
            $countries = DB::table('countries')->get();
            $ethnicities = DB::table('ethnicities')->get();
            $hairColours = DB::table('hair_colours')->get();
            $eyeColours = DB::table('eye_colours')->get();
            $educations = DB::table('education')->get();
            $drinkings = DB::table('drinking')->get();
            $smokings = DB::table('smoking')->get();
            $leisures = DB::table('leisures')->get();
            $personalityTypes = DB::table('personality_types')->get();


            return view('constraint.constraint')
                ->with('user', $user)
                //->with('userTargets', $userTargets)
                ->with('religions', $religions)
                ->with('genders', $genders)
                ->with('bodyTypes', $bodyTypes)
                ->with('countries', $countries)
                ->with('ethnicities', $ethnicities)
                ->with('hairColours', $hairColours)
                ->with('hairColours', $hairColours)
                ->with('eyeColours', $eyeColours)
                ->with('educations', $educations)
                ->with('drinkings', $drinkings)
                ->with('smokings', $smokings)
                ->with('leisures', $leisures)
                ->with('personalityTypes', $personalityTypes);
        } else {
            //Prevents other users from modifying your profile information
            return redirect('home');
        }
        //https://stackoverflow.com/questions/20110757/laravel-pass-more-than-one-variable-to-view
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate the $request
        //return $request->all();
        //https://laravel.com/docs/5.6/validation
        //https://stackoverflow.com/questions/23081654/check-users-age-with-laravel-validation-rules
        //https://hdtuto.com/article/php-laravel-set-custom-validation-error-messages-example

        $highestAllowedAge = empty($request->targetMinAge) ? 120 : $request->targetMaxAge;
        $lowestAllowedAge = empty($request->targetMaxAge) ? 18 : $request->targetMinAge;
        $highestAllowedHeight = empty($request->targetMinHeight) ? 300 : $request->targetMaxHeight;
        $lowestAllowedHeight = empty($request->targetMaxHeight) ? 50 : $request->targetMinHeight;
        $request->validate(
            [
                'targetGenderId' => 'nullable|integer|min:1',
                'targetMinAge' => 'nullable|integer|between: 18, 120|max:' . $highestAllowedAge,
                'targetMaxAge' => 'nullable|integer|between: 18, 120|min:' . $lowestAllowedAge,
                'targetMinHeight' => 'nullable|integer|between: 50, 300|max:' . $highestAllowedHeight,
                'targetMaxHeight' => 'nullable|integer|between: 50, 300|min:' . $lowestAllowedHeight,
                'targetBodyTypeId' => 'nullable|integer|min:1',
                'targetReligionId' => 'nullable|integer|min:1',
                'targetCountryId' => 'nullable|integer|min:1',
                'targetEthnicityId' => 'nullable|integer|min:1',
                'targetHairColourId' => 'nullable|integer|min:1',
                'targetEyeColourId' => 'nullable|integer|min:1',
                'targetEducationId' => 'nullable|integer|min:1',
                'targetDrinkingId' => 'nullable|integer|min:1',
                'targetSmokingId' => 'nullable|integer|min:1',
                'targetLeisureId' => 'nullable|integer|min:1',
                'targetPersonalityTypeId' => 'nullable|integer|min:1'
            ],
            [
                'targetMinAge.between' => 'Ages must be between 18 and 120 to use this site.',
                'targetMaxAge.between' => 'Ages must be between 18 and 120 to use this site.',
                'targetMinHeight.between' => 'Heights entered should be betwen 50 to 300cm.',
                'targetMaxHeight.between' => 'Heights entered should be betwen 50 to 300cm.',
                'targetMinAge.max' => 'The minimum age must not be greater than maximum age.',
                'targetMaxAge.min' => 'The maximum age must not be less than minimum age.',
                'targetMinHeight.max' => 'The minimum height must not be greater than maximum height.',
                'targetMaxHeight.min' => 'The maximum height must not be less than minimum height.',
                'targetMinAge.integer' => 'The minimum age must be a whole number.',
                'targetMaxAge.integer' => 'The maximum age must be a whole number.',
                'targetMinHeight.integer' => 'The minimum height must be a whole number.',
                'targetMaxHeight.integer' => 'The maximum height must be a whole number.',
            ]
        );


        // Writes update to the DB
        DB::transaction(function () use ($request) {
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update([
                    'targetGenderId' => $request->targetGenderId,
                    'targetMinAge' => $request->targetMinAge,
                    'targetMaxAge' => $request->targetMaxAge,
                    'targetCountryId' => $request->targetCountryId,
                    'targetEthnicityId' => $request->targetEthnicityId,
                    'targetMinHeight' => $request->targetMinHeight,
                    'targetMaxHeight' => $request->targetMaxHeight,
                    'targetBodyTypeId' => $request->targetBodyTypeId,
                    'targetEducationId' => $request->targetEducationId,
                    'targetReligionId' => $request->targetReligionId,
                    'targetHairColourId' => $request->targetHairColourId,
                    'targetEyeColourId' => $request->targetEyeColourId,
                    'targetDrinkingId' => $request->targetDrinkingId,
                    'targetSmokingId' => $request->targetSmokingId,
                    'targetLeisureId' => $request->targetLeisureId,
                    'targetPersonalityTypeId' => $request->targetPersonalityTypeId
                ]);
        });


        //Determines where to go next
        $userTargets = DB::table('users')->where('id', auth()->user()->id)->first();

        //Get Ready to flash a message on the next page
        $request->session()->flash('status', 'Your Matchmaking "Looking for a....." information has been updated.');
        //redirect home page.
        return redirect(route('home'));

        //Initial setup OR Incomplete information.
        //Target (constraint) attributes are null.
        //Modify this when next feature is added.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Functionality Disabled by routes page
        //User not admin, so not implemented.
    }
}
