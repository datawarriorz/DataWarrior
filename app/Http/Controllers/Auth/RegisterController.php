<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Subscription;
use App\Referral;
use App\Counselor;

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

    protected $redirectTo = '/verifymail';

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

    protected function register(Request $request)
    {
        if ($request->referral_code!=null) {
            $validator=Validator::make($request->all(), [
            'firstname' => 'required|min:3|max:35',
            'lastname' => 'required|min:3|max:35',
            'email' => 'required|email|unique:users',
            'contact_no' => 'required|numeric|unique:users',
            'password' => 'required|min:3|max:20',
            'confirm' => 'required|min:3|max:20|same:password',
            'referral_code' => 'exists:counselor,referral_code'
            
        ]);
        } else {
            $validator=Validator::make($request->all(), [
                'firstname' => 'required|min:3|max:35',
                'lastname' => 'required|min:3|max:35',
                'email' => 'required|email|unique:users',
                'contact_no' => 'required|numeric|unique:users',
                'password' => 'required|min:3|max:20',
                'confirm' => 'required|min:3|max:20|same:password',
            ]);
        }

        if ($validator->fails()) { // on validator found any error
            // pass validator object in withErrors method & also withInput it should be null by default
            return redirect('/register')->withErrors($validator)->withInput();
        }
        
        $newUser= new User();
        $newUser->first_name= $request->firstname;
        $newUser->email= $request->email;
        $newUser->last_name = $request->lastname;
        $newUser->password=Hash::make($request->password);
        $newUser->contact_no=$request->contact_no;
        $newUser->date_of_birth=$request->date_of_birth;
        $newUser->save();
        
        auth()->login($newUser, true);
        if ($request->newsletter=="yes") {
            $subcribe= new Subscription();
            $subcribe->newsletter=$request->newsletter;
            $subcribe->user_id=Auth::user()->user_id;
            $subcribe->save();
        } else {
            $subcribe= new Subscription();
            $subcribe->newsletter="no";
            $subcribe->user_id=Auth::user()->user_id;
            $subcribe->save();
        }
        if ($request->referral_code!=null) {
            $refer= new Referral();
            $counselor = Counselor::where('referral_code', $request->referral_code)->get();
            $refer->co_id=$counselor->co_id;
            $refer->user_id=Auth::user()->user_id;
            $refer->save();
        }
        return view('auth.verify');
        //return view('auth.login');
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['firstname'],
            'last_name' => $data['lastname'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'contact_no' => $data['contact_no'],
            'date_of_birth' => $data['dateofbirth'],
        ]);
    }
}
