<?php

namespace App\Http\Controllers;

use App\UserPreference;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;
use Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


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
        if (auth()->user()->id == $id)
        {
            $preferences = DB::table('preferences')->orderBy('preferenceCategoryId', 'asc')->get();
            $userPreferences = DB::table('user_preferences')->where('userId', auth()->user()->id)
                ->get();
            $preferenceTypes = DB::table('preference_types')->get();


            if ($userPreferences === null)
            {
                return redirect(route('preferences.edit', [auth()->user()->id]));
            }
            else
            {
                return view('preference.view')
                    ->with('userPreferences', $userPreferences)
                    ->with('preferences', $preferences)
                    ->with('preferenceTypes', $preferenceTypes);
            }





        }
        else
        {
            // Go home..
            return redirect(route('home'));
        }

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





            //Determine which preferences have not been set
            foreach($preferences as $preference)
            {

                $userPreference = DB::table('user_preferences')->where('userId', auth()->user()->id)
                    ->where('preferenceId', $preference->id)->first();

                //dd($userPreference);

                if ($userPreference === null)
                {
                    //Creates a new entry
                    DB::table('user_preferences')->insert([

                        'userId' => auth()->user()->id,
                        'preferenceId' => $preference->id,


                    ]);
                    //echo("Inner Loop");

                }

                //Obtained the $userPreference
                $userPreference = DB::table('user_preferences')->where('userId', auth()->user()->id)->where('preferenceId', $preference->id)->first();
                //echo $preference->id;
                //echo $preference->preferenceName;
                //echo $preference->preferenceCategoryId;
                //echo $preference->preferenceTypeId;


                $preferenceCategories = DB::table('preference_categories')->where('id', $preference->preferenceCategoryId)->first();
                $preferenceTypes = DB::table('preference_types')->where('id', $preference->preferenceTypeId)->first();
                $preferenceName = $preference->preferenceName;
                //Determine type of question
                //Pull up an appropriate view given the answer to above.

                if ($userPreference->answer === null||$userPreference->answerWeight === null)
                {
                    //redirect home page.

                    return view('preference.edit')
                        ->with('preferenceCategories', $preferenceCategories)
                        ->with('preferenceTypes', $preferenceTypes)
                        ->with('userPreference', $userPreference)
                        ->with('preferenceName', $preferenceName);
                }
                else
                {
                    //Don't do anything because the preference has been answered previously.
                }

                /*switch ($preferenceTypes->preferenceTypeName)
                {
                    case ("Normal"):
                        return view('preference.edit')
                            ->with('preferenceCategories', $preferenceCategories)
                            ->with('preferenceTypes', $preferenceTypes)
                            ->with('userPreference', $userPreference);
                        break;
                    case ("Boolean"):
                        return view('preference.boolean')
                            ->with('preferenceCategories', $preferenceCategories)
                            ->with('preferenceTypes', $preferenceTypes)
                            ->with('userPreference', $userPreference);
                        break;
                    default:
                        return view('home');
                        break;


                } */





            }

            //$preferences->session()->flash('status', '');
            //redirect home page.
            Session::flash('status', 'Your Preferences have been updated.');
            return redirect(route('home'));



        }
        else
        {
            // Go home..
            return redirect(route('home'));
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
        $request->validate([

            'answer' => 'required|integer|between: 0, 5',
            'answerWeight' => 'required|integer|between: 0, 5',
            'preferenceId' => 'required|integer|min:1',
            ],


            [

                'preferenceName.required' => 'This box cannot be empty',
                'answer.required' => 'This box cannot be empty',
                'answerWeight.required' => 'This box cannot be empty',
                'preferenceId.required' => 'This box cannot be empty',
                'answer.between' => 'Answer in this box must be between 0 and 5 inclusive.',
                'answerWeight.between' => 'Answer in this box must be between 0 and 5 inclusive.',
                'preferenceId.min' => 'Answer in this box must be 1 or greater.',
                'answer.integer' => 'Answer in this box must be a whole number.',
                'answerWeight.integer' => 'Answer in this box must be a whole number.',
                'preferenceId.integer' => 'Answer in this box must be a whole number.',



            ]
        );


        //Writes update  to the DB
        //Begin saving the data of the correct preference.
        //https://stackoverflow.com/questions/17084723/how-to-pass-parameter-to-laravel-dbtransaction
        DB::transaction(function() use ($request) {
            DB::table('user_preferences')
                ->where('userId', auth()->user()->id)
                ->where('preferenceId', $request->preferenceId)
                ->update(['answer' => $request->answer]);

            DB::table('user_preferences')
                ->where('userId', auth()->user()->id)
                ->where('preferenceId', $request->preferenceId)
                ->update(['answerWeight' => $request->answerWeight]);


        });


        //Determines where to go next
        $request->session()->flash('status', 'Your Matchmaking Preference has been saved');
        return redirect(route('preferences.edit', [auth()->user()->id]));
        // You must complete all user_preference fields.



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
