<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Organization;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        // $organization_id = 
            // Organization::where('name', '=', $data['organization_id'])->first()->id;

        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'gaurdian_name' => $data['gaurdian_name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'city' => $data['city'],
            'pincode' => $data['pincode'],
            'state' => $data['state'],
            'organization_id' => $data['organization_id'],//$organization_id,
            'password' => bcrypt($data['password']),
        ]);
    }

    /**
     * [showRegistrationForm description]
     * @return [type] [description]
     */
    public function showRegistrationForm()
    {
        $organizations = Organization::all();
        return view('auth.register', [
            'organizations' => $organizations
        ]);
    }
}
