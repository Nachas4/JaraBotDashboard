<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    | But now it doesn't!!
    |
    */

    
    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }
    

    /**
     * Show the application registration form.
     * 
     * Taken from RegistersUsers so we can change it without 'git pull' and compose.json install interfering with each other
     * 
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'user_id' => ['required', 'string'],
            'username' => ['required', 'string'],
            'global_name' => ['required', 'string'],
            'avatar' => ['required', 'string'],
            'banner_color' => ['required', 'string'],
            'mfa_enabled' => ['required', 'booalean'],
            'access_token' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_id' => $data['id'],
            'username' => $data['username'],
            'global_name' => $data['global_name'],
            'avatar' => $data['avatar'],
            'banner_color' => $data['banner_color'],
            'mfa_enabled' => $data['mfa_enabled'],
            'access_token' => Hash::make($data['access_token']),
        ]);
    }
}
