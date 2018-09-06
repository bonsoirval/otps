<?php

namespace App\Http\Controllers\Auth;

use App\Alumni;
//use App\User;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class AlumniRegisterController extends Controller
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
    //protected $redirectTo = '/nursing'; //original setting
    protected $redirectTo = '/alumni';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      //exit('hello');
        $this->middleware('guest:alumni');
    }


    public function messages()
    {
        return [
            'pin.exists' => 'Invalid or used Scratch Card Pin',
            'body.required'  => 'A message is required',
        ];
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
          'department_id' => 'required',
          'mat_number' => 'required|max:8',
          'email' => 'required|string|email|max:255|unique:alumnis',
          'phone' => 'required|min:11|max:13|unique:alumnis',
          'password' => 'required|string|min:6|confirmed',
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
        return Alumni::create([
          'name' => $data['name'],
          'mat_number' => $data['mat_number'],
          'department_id' => $data['department_id'],
          'email' => $data['email'],
          'phone' => $data['phone'],
          'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegisterForm()
    {
        return view('auth.alumni-register');
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();


        event(new Registered($user = $this->create($request->all())));

        Auth::guard('alumni')->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }


}
