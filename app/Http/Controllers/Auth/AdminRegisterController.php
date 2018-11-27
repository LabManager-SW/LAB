<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;

class AdminRegisterController extends Controller
{
    /**
     * Where to redirect admin after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : 'admin/home';
    }

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
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => 'required|string|unique:admins',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'lab_name' => 'required|string|max:255',
            'phone' => 'required|unique:admins',
            'password' => 'required|string|min:6|confirmed',
            'univ' => 'required|string',
            'dept' => 'required|string',
            'birth' => 'required',
            'gender' => 'required',
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return \App\Admin
     */
    protected function create(array $data)
    {
        $user=Admin::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'lab_name' => $data['lab_name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'univ' => $data['univ'],
            'dept' => $data['dept'],
            'birth' => $data['birth'],
            'gender' => $data['birth'],
        ]);
        $user
            ->roles()
            ->attach(Role::where('name', 'admin')->first());

        return $user;
    }
    public function showRegistrationForm()
    {
        return view('auth.register-researcher');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        //
    }
}
