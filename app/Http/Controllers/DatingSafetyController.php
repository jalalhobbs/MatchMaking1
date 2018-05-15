<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatingSafetyController extends Controller
{
    public function index()
    {
        return view('dating-safety')
            ->with('pageName', "Dating Safety");
    }
}
