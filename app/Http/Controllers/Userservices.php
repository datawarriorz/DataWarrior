<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Userservices extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }
}