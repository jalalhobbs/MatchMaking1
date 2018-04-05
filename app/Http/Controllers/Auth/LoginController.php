<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from Facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $driver = Socialite::driver('facebook')->fields([
            'name',
            'first_name',
            'last_name',
            'email',
            'gender',
            'verified'
        ]);

        // following is what we can get for facebook public_profile. See https://developers.facebook.com/docs/facebook-login/permissions#reference-public-profile
        $user = $driver->user();

        //cho $user->getId();
        //echo $user->getName();
        echo $user->user['first_name'];
        //echo $user->getNickname();
        //echo $user->getEmail();
        //echo $user->getAvatar();
//        $user->getId();
        // $user->token;
    }
}
