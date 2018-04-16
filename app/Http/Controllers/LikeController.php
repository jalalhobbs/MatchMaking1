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
            DB::table('matches')
                ->where('userId', auth()->user()->id)
                ->where('targetId', $request->targetId)
                ->update(['likeStatus' => $request->likeStatus]);
        });
    }
}