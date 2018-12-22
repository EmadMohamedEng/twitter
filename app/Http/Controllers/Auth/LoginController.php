<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; // socail media login
use Auth;
use App\User;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // Facebook login
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {

        $facebook = Socialite::driver('facebook')->user();

        $find = User::whereEmail($facebook->email)->first() ;
        if($find){
            Auth::login($find);
            return redirect('/home');
        }else{

            $user = new User();
            $user->name = $facebook->name;
            $user->email = $facebook->email;
            $user->password = bcrypt(123456);
            $user->save() ;
            Auth::login( $user);
            return redirect('/home');
        }



    }


    // google login
    public function googleRedirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleProviderCallback()
    {

        // The stateless method may be used to disable session state verification
        $google =Socialite::driver('google')->stateless()->user();

        $find = User::whereEmail($google->email)->first() ;
        if($find){
            Auth::login($find);
            return redirect('/home');
        }else{

            $user = new User();
            $user->name = $google->name;
            $user->email = $google->email;
            $user->password = bcrypt(123456);
            $user->save() ;
            Auth::login( $user);
            return redirect('/home');
        }



    }

}
