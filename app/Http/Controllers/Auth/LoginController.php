<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */ 
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //User.php   use HasApiTokens
    // auth.php API driver
    // \Laravel\Passport\Http\Middleware\CreateFreshApiToken::class,  was added to KERNEL.PHP
    //And then inside here we're going to perform the password grand tokens by hitting the oauth token endpoint
    //Now to hit the oauth/token endpoint and get the token back 
    //we need to pass in at least 5 things: 
    //    grant_type,
    //    client_id,
    //    client_secret,
    //    username and password.

        // Client ID: 1
        // Client secret: Vl5sZ1SXwV98MI9enIGabmLkhlPSpBHAq4pIF7mB
        // Password grant client created successfully.
        // Client ID: 2
        // Client secret: azSeKyZuyYuQNrsjCMEY8LWHRTGBLsWOZJmMYCES
    
}
