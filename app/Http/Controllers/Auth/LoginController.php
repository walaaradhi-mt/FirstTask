<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//import the Request class for the overriden method
use Illuminate\Http\Request;
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
    protected $redirectTo = '/timeline';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //overriden method to add the status condition and modify the error message displayed
    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
        $this->username() => 'required|exists:users,' . $this->username() . ',status,1',
        'password' => 'required',
    ], [
        $this->username() . '.exists' => 'These credentials do not match our records or your e-mail address has not been verified.'
    ]);
    }
}
