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
        $matches = DB::table('matches as their_matches')
            ->where('their_matches.targetId', '=', auth()->user()->id)
            ->where('their_matches.likeStatus', '=', '2')
            ->join('matches as my_matches', 'my_matches.targetId', '=', 'their_matches.userId')
            ->where('my_matches.likeStatus', '=', '2')
            ->leftJoin('users', 'my_matches.targetId', '=', 'users.id')
            ->leftJoin('genders', 'users.genderId', '=', 'genders.id')
            ->select('users.firstName',
                'genders.genderName',
                'users.profilePicture',
                'users.dob',
                'users.id',
                'my_matches.likeStatus as likeStatus',
                'users.email as email'
            )
            ->get();

        foreach ($matches as $key => $pot) {
            $age = $this->getAge($pot->dob);
            $matches[$key]->age = $age;
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