<?php

namespace marinareport\Http\Controllers\Auth;

use marinareport\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Input as Input;
use marinareport\User as User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth as Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login()
    {
        $data = Input::all();
        try {
            $user = User::where('email',$data['email'])->firstorFail();
            if($user->password == $data['password']){
                Auth::login($user);
                return redirect::route('home');
            }
        }
        catch (ModelNotFoundException $ex) {
            return view('welcome')->withErrors(['email' => 'Email Adresse oder Passwort wurde falsch eingegeben','password' => ' ']);
        }

    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
