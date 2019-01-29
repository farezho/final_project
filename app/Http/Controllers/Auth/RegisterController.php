<?php

namespace App\Http\Controllers\Auth;

use App\User, App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // IN THIS LINE THERE'S protected redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $messages = array(
            'unique' => 'The :attribute already exist, pick another one',
            'before' => 'Sorry, the user must be 17 y.o or above',
            'max' => 'Max characters of :attribute is 75'
        );

        return Validator::make($data, [
            'name' => 'required|string|max:75',
            'email' => 'required|string|email|max:75|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'birthday' => 'required|date|before:-17 years'
        ], $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $user->roles()->attach(Role::where('name','user')->first());
        return $user;
    }

    public function redirectTo()
    {
        Session::flash("notice", "Registration success! Login to use this web app");
        return '/';
    }
}
