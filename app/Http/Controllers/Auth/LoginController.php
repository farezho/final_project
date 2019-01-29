<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/** This added by user */
use Illuminate\Support\Facades\Auth;
use Input;
use Redirect;
use Validator;

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
    //IN THIS LINE THERE'S  protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        // User role
        $roles = Auth::user()->roles()->get(); //this will produce collection
        // dd($role);

        // get the role of user
        foreach ($roles as $role) {
            // Check user role adn redirect to each dashboard
            // echo $role->name;
            if ($role->name == 'admin') {
                return '/admin-dashboard';
            } else {
                return '/user';
            }
            
        }   
    }
}
