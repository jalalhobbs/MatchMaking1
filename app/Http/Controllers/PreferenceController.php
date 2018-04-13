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
                echo $preferenceTypes->preferenceTypeName;
                return view('preference.edit')
                    ->with('preferenceCategories', $preferenceCategories)
                    ->with('preferenceTypes', $preferenceTypes)
                    ->with('userPreference', $userPreference)
                    ->with('preferenceName', $preferenceName);

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
