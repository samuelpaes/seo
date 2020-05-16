<?php

namespace SEO\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

use SEO\User;
use SEO\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
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


	 public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/alterar-usuario';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'registro' => ['required', 'integer', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \SEO\User
     */
    protected function create(array $data)
    {
        $secretarias = "";
        foreach($data['secretaria'] as $secretaria){
            $secretarias =  $secretaria.";".$secretarias;
        }
        return User::create([
            'name' => strtoupper($data['name']),
			'secretaria' => $secretarias,
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
			'registro'=> $data['registro'],
			'isAdmin'=> $data['isAdmin'],
			'sobrenome'=> strtoupper($data['sobrenome']),
        ]);
    }
}
