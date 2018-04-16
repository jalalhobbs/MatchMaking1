<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    public function showLoginForm()
    {
        return view('auth.admin-login');
        //The only people who are not logged in.
    }

    public function login(Request $request)
    {
        //Validate data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:8'

        ]);
        //Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //Redirect if successful
            return redirect()->intended(route('admin.home'));
            //Redirect if unsuccessful
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }

        return true;
    }
}


//Code inspired by https://www.youtube.com/watch?v=iKRLrJXNN4M&list=PLwAKR305CRO9S6KVHMJYqZpjPzGPWuQ7Q