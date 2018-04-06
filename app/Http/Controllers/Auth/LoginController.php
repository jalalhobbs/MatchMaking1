<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
        $facebookUser = Socialite::driver('facebook')->fields([
            'name',
            'first_name',
            'last_name',
            'email',
            'gender',
            'verified'
        ])->user();

        if ($user = User::where('facebookProfileLink', $facebookUser->getId())) { // find account with facebook ID attached
            $authUser = $user;
        } elseif ($user = User::where('email', $facebookUser->getEmail())) { // enforce facebook if no facebook
//            enforceFacebookUserStats($facebookUser);
            $authUser = $user;
        } else { // create
            $authUser = User::create([
                'firstName' => $facebookUser->user['first_name'],
                'lastName' => $facebookUser->user['last_name'],
                'email' => $facebookUser->getEmail,
                'facebookProfileLink' => $facebookUser->getId(),
                'password' => 'foobar',
            ]);
        }
//        echo json_encode($authUser);
//        echo $facebookUser->user['first_name'];
        if ($authUser) {
            Auth::login($authUser);
            return Redirect::to('home');
        }




//        echo $user->getId();
//        echo $user->getName();
//        echo $user->user['first_name'];
//        echo $user->getNickname();
//        echo $user->getEmail();
//        echo $user->getAvatar();
    }
}
