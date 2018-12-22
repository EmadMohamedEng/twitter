
<!--Github account :-->

eng.emad_2010@yahoo.com

01223872695extra55

EmadMohamedEng


<!--- make login in laravel 5.5  :-->

php artisan make:auth



<!--  laravel 5.5 socialite install -->

composer require laravel/socialite

<!-- good tutorials for facebook loginamd google -->
https://www.youtube.com/playlist?list=PLOF5SHQviO37jBtBvB5WNKf1RlIA2E6xG



2 - add this in providers :
Laravel\Socialite\SocialiteServiceProvider::class,

and this in aliases :
'Socialite' => Laravel\Socialite\Facades\Socialite::class,


3- make an app on facebook and write the creadional on this file :


<!--  C:\xampp\htdocs\bases\laravel2\config\services.php -->

'facebook' => [
'client_id' => '1545418985762361',
'client_secret' => 'c5506cae10cc1eb94a801a971a4c7075',
//  'redirect' => 'http://sximobuilder.com/sximodemo/sximo5/user/facebook',
'redirect' => 'http://localhost/laravel2/callback',
],




- after you create app we make   :  add platform :
                     select website     then write  your website link :
http://localhost/twitter/




4- add these routes :

<?php
// facebook routes
Route::get('login/facebook', 'Auth\LoginController@redirectToProvider')->name('facebook');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
?>


<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite; // socail media login


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


}



?>


<!--and in the view :-->


<a href="{{route('facebook')}}" type="button" class="btn btn-primary">
    FaceBook Login
</a>





<!--cURL error 60: SSL certificate problem: unable to get local issuer certificate-->

https://stackoverflow.com/questions/29822686/curl-error-60-ssl-certificate-unable-to-get-local-issuer-certificate


for other environment - download and extract for cacert.pem here (a clean file format/data)

https://curl.haxx.se/docs/caextract.html

put it here
C:\xampp\php\extras\ssl\cacert.pem

in your php.ini put this line in this section ("c:\xampp\php\php.ini"):
;;;;;;;;;;;;;;;;;;;;
; php.ini Options  ;
;;;;;;;;;;;;;;;;;;;;

curl.cainfo = "C:\xampp\php\extras\ssl\cacert.pem"
restart your webserver/apache