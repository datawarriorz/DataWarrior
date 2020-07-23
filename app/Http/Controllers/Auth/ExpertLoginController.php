<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class ExpertLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('expert.auth.login');
    }
    protected function guard()
    {
        return Auth::guard('expert');
    }
    
    use AuthenticatesUsers;
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/expertdashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:expert')->except('logout');
    }
}
