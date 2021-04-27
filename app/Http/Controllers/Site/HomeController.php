<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('site.home.index');
    }

    public function login()
    {
        return view('site.login.login');
    }

    public function cadastro()
    {
        return view('site.login.signUp');
    }
}
