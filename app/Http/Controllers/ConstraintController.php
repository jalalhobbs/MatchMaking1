<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

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
        if (auth()->user()->id == $id)
        {


            $user = DB::table('users')->where('id', auth()->user()->id)->first();
            $religions = DB::table('religions')->get();
            $genders = DB::table('genders')->get();
            $bodyTypes = DB::table('body_types')->get();

            return view('constraint.constraint')
                ->with('user', $user)
                ->with('religions', $religions)
                ->with('genders', $genders)
                ->with('bodyTypes', $bodyTypes);


        }
        else
        {
            //Prevents other users from modifying your profile information
            return redirect('home');

        }
        //https://stackoverflow.com/questions/20110757/laravel-pass-more-than-one-variable-to-view

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
        //Validate the $request
        //return $request->all();
        //https://laravel.com/docs/5.6/validation
        //https://stackoverflow.com/questions/23081654/check-users-age-with-laravel-validation-rules
        //https://hdtuto.com/article/php-laravel-set-custom-validation-error-messages-example
//.(int)$request->targetMaxAge .(int)$request->targetMinAge.
        $request->validate([

            'targetGenderId' => 'required|integer|min:1',
            'targetMinAge' => 'required|integer|between: 18, 120|max:'.(int)$request->targetMaxAge,
            'targetMaxAge' => 'required|integer|between: 18, 120|min:'.(int)$request->targetMinAge,
            'targetMinHeight' => 'required|integer|between: 50, 300|max:'.(int)$request->targetMaxHeight,
            'targetMaxHeight' => 'required|integer|between: 50, 300|min:'.(int)$request->targetMinHeight,
            'targetBodyTypeId' => 'required|integer|min:1',
            'targetReligionId' => 'required|integer|min:1'],


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


        //Writes update  to the DB
        //https://stackoverflow.com/questions/17084723/how-to-pass-parameter-to-laravel-dbtransaction
        DB::transaction(function() use ($request) {
            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetGenderId' => $request->targetGenderId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetMinAge' => $request->targetMinAge]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetMaxAge' => $request->targetMaxAge]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetMinHeight' => $request->targetMinHeight]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetMaxHeight' => $request->targetMaxHeight]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetBodyTypeId' => $request->targetBodyTypeId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['targetReligionId' => $request->targetReligionId]);
//hello.

        });






        //Determines where to go next
        $user = DB::table('users')->where('id', auth()->user()->id)->first();

        //Get Ready to flash a message on the next page
        $request->session()->flash('status', 'Your Matchmaking "Looking for a....." preferences have been updated.');

        //Initial setup OR Incomplete information.
        //Target (constraint) attributes are null.
        //Modify this when next feature is added.
        if (($user->targetGenderId === null)||
            ($user->targetMinAge === null)||
            ($user->targetMaxAge === null)||
            ($user->targetMinHeight === null)||
            ($user->targetMaxHeight === null)||
            ($user->targetBodyTypeId === null)||
            ($user->targetReligionId === null))
        {
            //return redirect(route('lookingfor.edit'));
            return redirect(route('home'));
        }
        else
        {
            //Account Already Setup?
            //redirect home page.
            return redirect(route('home'));
        }










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
        //User not admin, so not implemented.
    }
}
