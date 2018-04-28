<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
        DB::transaction(function() use ($request) {
            $likeValue = 3;
            if ($request['isLike'] === '0') {
                $likeValue = 0;
            } elseif ($request['isLike'] === '1') {
                $likeValue = 1;
            } elseif ($request['isLike'] === '2') {
                $likeValue = 2;
            }
            DB::table('matches')
                ->where('userId', auth()->user()->id)
                ->where('targetId', $request['targetId'])
                ->update(['likeStatus' => $likeValue]);
        });
    }
}