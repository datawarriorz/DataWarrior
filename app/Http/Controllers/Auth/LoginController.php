<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\Counselor;
use App\Referral;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use DB;
use Exception;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->stateless()->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
        // $user->token;
        DB::beginTransaction();

        try {
            $existingUser = User::where('email', $user->getEmail())->first();

            if ($existingUser) {
                auth()->login($existingUser, true);
                return redirect($this->redirectPath());
            } else {
                $newUser                    = new User;
                $newUser->provider_name     = 'google';
                $newUser->provider_id       = $user->getId();
                $newUser->first_name        = $user->getName();
                $newUser->email             = $user->getEmail();
                $newUser->email_verified_at = now();
                $newUser->save();
                auth()->login($newUser, true);
                $subcribe= new Subscription();
                $subcribe->newsletter="yes";
                $subcribe->user_id=Auth::user()->user_id;
                $subcribe->save();
            }
            DB::commit();
            
            return view('user.auth.user-referral');
            //return redirect($this->redirectPath());
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
