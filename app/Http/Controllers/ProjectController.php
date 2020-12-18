<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('logout');
    }

    public function showprojecthome()
    {
        return view('user.modules.project.p-home', []);
    }
}
