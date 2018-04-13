<?php

namespace App\Http\Controllers;

use App\UserPreference;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PreferenceController extends Controller
{
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
        return redirect(route('preferences.edit', [auth()->user()->id]));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Functionality Disabled by routes page

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Functionality Disabled by routes page

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Make sure authenticated user is the only one changing their data.
        if (auth()->user()->id == $id)
        {

            //Retrieve Data from DB
            $preferences = DB::table('preferences')->orderBy('preferenceCategoryId', 'asc')->get();
            $preferenceCategories = DB::table('preference_categories')->get();
            $preferenceTypes = DB::table('preference_types')->get();
            $userPreferences = DB::table('user_preferences')->where('id', auth()->user()->id)->get();


            //Determine which preferences have not been set
            foreach($preferences as $preference)
            {
                //dd($preference);

                $userPreference = DB::table('user_preferences')->where('id', auth()->user()->id)
                    ->where('preferenceId', $preference->id)->first();

                //dd($userPreference);

                if ($userPreference === null)
                {
                    //return "You suck";


                    DB::table('user_preferences')->insert([

                        'userId' => auth()->user()->id,
                        'preferenceId' => $preference->id,


                    ]);

                    $userPreference = DB::table('user_preferences')->where('id', auth()->user()->id)
                        ->where('preferenceId', $preference->id)->first();

                    //dd($userPreference);
                    echo("Inner Loop");
                    echo($userPreference->id);
                    echo($userPreference->userId);
                    echo($userPreference->preferenceId);



                }
                echo("Outer Loop");
                echo($userPreference->id);
                echo($userPreference->userId);
                echo($userPreference->preferenceId);

            }

            //Determine type of question

            //Pull up an appropriate view given the answer to above.

        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Validate Response

        //Begin saving the data of the correct preference.

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Functionality Disabled by routes page

    }
}
