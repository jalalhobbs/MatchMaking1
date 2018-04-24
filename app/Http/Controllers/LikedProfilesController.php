<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LikedProfilesController extends Controller
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
        $potentialMatches = DB::table('matches')
            ->where('matches.userId', '=', auth()->user()->id)
            ->where('matches.likeStatus', '=', '2')
            ->leftJoin('users', 'matches.targetId', '=', 'users.id')
            ->leftJoin('genders', 'users.genderId', '=', 'genders.id')
            ->select('users.firstName',
                'genders.genderName',
                'users.profilePicture',
                'users.dob',
                'users.id',
                'matches.likeStatus')
            ->get();

        foreach ($potentialMatches as $key => $pot) {
            $age = $this->getAge($pot->dob);
            $potentialMatches[$key]->age = $age;
        }

        return view('home')
            ->with('matches', $potentialMatches)
            ->with('pageName', "Liked Profiles");
    }

    private function getAge($dob)
    {
        //inspired by https://stackoverflow.com/questions/35524482/calculate-age-from-date-stored-in-database-in-y-m-d-using-laravel-5-2
        return Carbon::parse($dob)->diff(Carbon::now())->format('%y');
    }

}
