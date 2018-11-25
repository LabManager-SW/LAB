<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class AdminRegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect admin after registration.
     *
     * @var string
     */
    protected $redirectTo = 'admin/home';

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
        $admin=Admin::create([
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
        $admin
            ->roles()
            ->attach(Role::where('name', 'admin')->first());

        return $admin;
    }
}
