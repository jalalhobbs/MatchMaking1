<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class MatchesController extends Controller
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
        $matches = DB::select('SELECT
                              users.firstName,
                              genders.genderName,
                              users.profilePicture,
                              users.dob,
                              users.id,
                              users.email
                            FROM matches as my_matches
                              JOIN matches as their_matches
                                ON my_matches.targetId = their_matches.userId
                              JOIN users
                                ON my_matches.targetId = users.id
                              LEFT JOIN genders
                                ON users.genderId = genders.id
                            WHERE my_matches.userId = '.auth()->user()->id.'
                                  AND their_matches.targetId ='.auth()->user()->id.'
                                  AND my_matches.likeStatus = 2
                                  AND their_matches.likeStatus = 2');
//        foreach ($matches as $key => $pot) {
//            $age = $this->getAge($pot->dob);
//            $matches[$key]->age = $age;
//        }

        foreach ($matches as $match) {
            if (isset($match->dob)) {
                $match->age = $this->getAge($match->dob);
            } else {
                $match->age = null;
            }
            $match->likeStatus = 2;
        }

        return view('home')
            ->with('matches', $matches)
            ->with('pageName', "Matches");
    }


    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }
}