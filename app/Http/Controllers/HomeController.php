<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ([auth()->user()->id])
        {
            $potentialMatches = DB::table('matches')->where('matches.userId', '=', auth()->user()->id)
                ->leftJoin('users', 'matches.targetId', '=', 'users.id')
                ->leftJoin('genders', 'users.genderId', '=', 'genders.id')->select('users.firstName', 'genders.genderName', 'users.profilePicture', 'users.dob')->get();

            return view('home')
                ->with('potentialMatches', $potentialMatches);
        }
        else
        {
            return view('home');
        }
    }

}
