<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use Auth;
use App\User;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


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

        if (!$authUser = $this->facebookUserCheck($facebookUser)) {
            $authUser = $this->create($facebookUser);
        }

        Auth::login($authUser);
        return redirect('/home');
    }

    private function create($facebookUser)
    {
        $user = User::create([
            'firstName' => $facebookUser->user['first_name'],
            'lastName' => $facebookUser->user['last_name'],
            'email' => $facebookUser->user['email'],
            'facebookProfileLink' => $facebookUser->getId(),
            'profilePicture' => $facebookUser->getAvatar(),
            'password' => Hash::make("fakeP!assword123"),
            // TODO: null password out on creation of facebook user
        ]);

        Mail::to($facebookUser->user['email'])->send(new WelcomeMail($user));
        return $user;
    }

    private function facebookUserCheck($facebookUser) {
        if ($user = User::where('facebookProfileLink', $facebookUser->getId())->first()) { // find account with facebook ID attached
            return $user;
        } elseif ($user = User::where('email', $facebookUser->user['email'])->first()) { // enforce facebook if no facebook
            // TODO: function enforceFacebookUserStats($facebookUser);
            return $user;
        }
        return false;
    }
}
