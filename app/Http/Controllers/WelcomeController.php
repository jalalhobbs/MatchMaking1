<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //No need to login to see welcome page.
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genders = DB::table('genders')->get();

        return view('welcome')->with('genders', $genders);

    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'genderId' => 'nullable|integer|min:1',
                'targetGenderId' => 'nullable|integer|min:1',

            ],
            [
                //No validation, this is rechecked later once account is created by register page.
            ]
        );

        session()->put('genderId', $request->genderId);
        session()->put('targetGenderId', $request->targetGenderId);

        $genders = DB::table('genders')->get();

        return redirect(route('register'))->with('genders', $genders);


    }




}
