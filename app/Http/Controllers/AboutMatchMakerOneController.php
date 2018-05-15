<?php

namespace App\Http\Controllers;

class AboutMatchMakerOneController extends Controller
{
    public function index()
    {
        return view('about-match-maker-one')
            ->with('pageName', "About Match Maker One");
    }
}