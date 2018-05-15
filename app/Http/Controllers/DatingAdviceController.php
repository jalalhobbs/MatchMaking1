<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatingAdviceController extends Controller
{
    public function index()
    {
        return view('dating-advice')
            ->with('pageName', "Dating Advice");
    }
}
