<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class ProfileController extends Controller
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
        return redirect(route('profile.edit', [auth()->user()->id]));
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
        //Insert Rules for determining a like here


        //Get information for Show view
        $user = DB::table('users')->where('id', $id)->first();
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
        $age = $this->getAge($user->dob);


        //Load view profile.show with data as needed.
        return view('profile.show')
            ->with('user', $user)
            ->with('religions', $religions)
            ->with('genders', $genders)
            ->with('bodyTypes', $bodyTypes)
            ->with('countries', $countries)
            ->with('ethnicities', $ethnicities)
            ->with('hairColours', $hairColours)
            ->with('eyeColours', $eyeColours)
            ->with('educations', $educations)
            ->with('drinkings', $drinkings)
            ->with('smokings', $smokings)
            ->with('leisures', $leisures)
            ->with('personalityTypes', $personalityTypes)
            ->with('age', $age);
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


            return view('profile.edit')
                ->with('user', $user)
                ->with('religions', $religions)
                ->with('genders', $genders)
                ->with('bodyTypes', $bodyTypes)
                ->with('countries', $countries)
                ->with('ethnicities', $ethnicities)
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
        //https://stackoverflow.com/questions/25473823/laravel-regex-match-url-with-jpg-not-working

        $request->validate([
            'dob' => 'required|after:1900-01-01|before:-18years',
            'profilePicture' => array('required',
                'regex:/https\:\/\/graph\.facebook\.com\/v2\.10\/[0-9]+\/picture\?type\=normal|[a-zA-Z]+\/((([\w\/-]+)\/)?[\w.-]+\.(png|svg|bmp|gif|jpe?g))$/'),
            'genderId' => 'required|integer|min:1',
            'height' => 'nullable|integer|min:0|max:300',
            'bodyTypeId' => 'nullable|integer|min:1',
            'religionId' => 'nullable|integer|min:1',
            'countryId' => 'nullable|integer|min:1',
            'ethnicityId' => 'nullable|integer|min:1',
            'hairColourId' => 'nullable|integer|min:1',
            'eyeColourId' => 'nullable|integer|min:1',
            'educationId' => 'nullable|integer|min:1',
            'drinkingId' => 'nullable|integer|min:1',
            'smokingId' => 'nullable|integer|min:1',
            'leisureId' => 'nullable|integer|min:1',
            'personalityTypeId' => 'nullable|integer|min:1',


        ],


            ['dob.before' => 'You must be 18 to use this site.']
        );


        //Writes update  to the DB
        //https://stackoverflow.com/questions/17084723/how-to-pass-parameter-to-laravel-dbtransaction
        DB::transaction(function () use ($request) {
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['dob' => $request->dob]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['genderId' => $request->genderId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['height' => $request->height]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['profilePicture' => $request->profilePicture]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['bodyTypeId' => $request->bodyTypeId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['religionId' => $request->religionId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['countryId' => $request->countryId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['ethnicityId' => $request->ethnicityId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['hairColourId' => $request->hairColourId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['eyeColourId' => $request->eyeColourId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['educationId' => $request->educationId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['drinkingId' => $request->drinkingId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['smokingId' => $request->smokingId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['leisureId' => $request->leisureId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['personalityTypeId' => $request->personalityTypeId]);



        });


        //Determines where to go next
        $user = DB::table('users')->where('id', auth()->user()->id)->first();


        //Determines where to go next
        $userTargets = DB::table('users')->where('id', auth()->user()->id)->first();



        //Constraints are not mandatory, Would be nice to know at least 1 constraint.





        if (($userTargets->targetGenderId === null) &&
            ($userTargets->targetMinAge === null) &&
            ($userTargets->targetMaxAge === null) &&
            ($userTargets->targetMinHeight === null) &&
            ($userTargets->targetMaxHeight === null) &&
            ($userTargets->targetBodyTypeId === null) &&
            ($userTargets->targetReligionId === null) &&
            ($userTargets->targetCountryId === null) &&
            ($userTargets->targetEthnicityId === null) &&
            ($userTargets->targetHairColourId === null))

        {
            //return redirect(route('lookingfor.edit'));
            //Get Ready to flash a message on the next page

            $request->session()->flash('status', 'Your Profile has been updated. Please tell us more about who you are looking for. Leave out anything which you dont mind.');
            return redirect(route('looking-for.edit', [auth()->user()->id]));
        } else {
            //Account Already Setup with >1 constraint
            //redirect home page.
            //Get Ready to flash a message on the next page

            $request->session()->flash('status', 'Your Profile has been updated. ');
            return redirect(route('home'));
        }


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

    public function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        //return Carbon::parse($dob);
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
        //\Carbon\Carbon::parse($user->birth)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
    }

    public function getDaySinceCreation($creationDateTime)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        //return Carbon::parse($dob);
        return Carbon::parse($creationDateTime)->diff(Carbon::now())->format('%d');
        //\Carbon\Carbon::parse($user->birth)->diff(\Carbon\Carbon::now())->format('%y years, %m months and %d days');
    }
}
