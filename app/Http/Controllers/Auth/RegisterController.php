<?php

namespace App\Http\Controllers\Auth;

use App\User;
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
     * Where to redirect users after registration.
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'fantateam' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $fantateam = 0;
        switch ($data['fantateam']) {
            case 'Brighton':
                $fantateam = 1;
                break;
            case 'Vasco da Gama':
                $fantateam = 2;
                break;
            case 'Hercules':
                $fantateam = 3;
                break;
            case 'Sanfrecce':
                $fantateam = 4;
                break;
            case 'Nizza':
                $fantateam = 5;
                break;
            case 'Nottingham':
                $fantateam = 6;
                break;
            case 'Pachuca':
                $fantateam = 7;
                break;
            case 'Sabadell':
                $fantateam = 8;
                break;
            case 'Unam':
                $fantateam = 9;
                break;
            case 'Virtus Entella':
                $fantateam = 1;
                break;
            default:
                # code...
                break;
        }

        return User::create([
            'fantateam_id' => $fantateam,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
