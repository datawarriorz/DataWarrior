<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Counselor;
use App\Referral;
use App\Subscription;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
    public function userreferral(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'referral_code' => 'required|exists:counselor,referral_code',
        
        ]);

        if ($validator->fails()) {
            return redirect('/user-referral')->withErrors($validator)->withInput();
        }
        $counselor = Counselor::where('referral_code', $request->referral_code)->first();
        
        if ($counselor==null) {
            return redirect('/user-referral')->with(['message'=> 'Invalid Referral Code']);
        }
        
        $refer= new Referral();
        $refer->co_id=$counselor->co_id;
        $refer->user_id=Auth::user()->user_id;
        $refer->save();
        return redirect('/');
    }
}
