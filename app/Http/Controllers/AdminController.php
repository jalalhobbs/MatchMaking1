<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin-home');
    }
}

//Code inspired by https://www.youtube.com/watch?v=iKRLrJXNN4M&list=PLwAKR305CRO9S6KVHMJYqZpjPzGPWuQ7Q
