<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use App\Counselor;

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

        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $newUser                    = new User;
            $newUser->provider_name     = 'google';
            $newUser->provider_id       = $user->getId();
            $newUser->first_name        = $user->getName();
            $newUser->email             = $user->getEmail();
            $newUser->email_verified_at = now();
            $newUser->save();
            auth()->login($newUser, true);
        }
        return view('user-referral');
        //return redirect($this->redirectPath());
    }
    public function userreferral(Request $request)
    {
        $validator=Validator::make($request->all(), [
           
            'referral_code' => 'exists:counselor,referral_code'
            
        ]);

        if ($validator->fails()) { // on validator found any error
            // pass validator object in withErrors method & also withInput it should be null by default
            return redirect('/register')->withErrors($validator)->withInput();
        }
        $counselor = Counselor::where('referral_code', $request->referral_code)->get();
        if ($counselor==null) {
            return redirect('/user-referral')->with(['message'=> 'Invalid Referral Code']);
        }
        $refer= new Referral();
        $refer->co_id=$counselor->co_id;
        $refer->user_id=Auth::user()->user_id;
        $refer->save();
        return redirect($this->redirectPath());
    }
}
