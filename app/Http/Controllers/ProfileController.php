<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\DB;

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

            return view('profile.profile')
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

       $request->validate([
            'dob' => 'required|after:1900-01-01|before:-18years',
            'genderId' => 'required|integer|min:1',
            'height' => 'required|integer|min:0|max:300',
            'bodyTypeId' => 'required|integer|min:1',
            'religionId' => 'required|integer|min:1'],

           [ 'dob.before' => 'You must be 18 to use this site.']
        );


        //Writes update  to the DB
        //https://stackoverflow.com/questions/17084723/how-to-pass-parameter-to-laravel-dbtransaction
        DB::transaction(function() use ($request) {
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
                ->update(['bodyTypeId' => $request->bodyTypeId]);

            DB::table('users')
                ->where('id', auth()->user()->id)
                ->update(['religionId' => $request->religionId]);


        });






        //Determines where to go next
        $user = DB::table('users')->where('id', auth()->user()->id)->first();



        //Initial setup OR Incomplete information.
        //Target (constraint) attributes are null.
        if (($user->targetGenderId === null)||
            ($user->targetMinAge === null)||
            ($user->targetMaxAge === null)||
            ($user->targetMinHeight === null)||
            ($user->targetMaxHeight === null)||
            ($user->targetBodyTypeId === null)||
            ($user->targetReligionId === null))
        {
            //Get Ready to flash a message on the next page
            $request->session()->flash('status', 'Your Profile has been updated. Please complete your "Looking for a..." preferences below.');
            return redirect(route('looking-for.edit', [auth()->user()->id]));
        }
        else
        {
            //Account Already Setup?
            //redirect home page.
            //Get Ready to flash a message on the next page
            $request->session()->flash('status', 'Your Profile has been updated.');
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
