<?php

namespace App\Http\Controllers\Site\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:cliente')->except('logout');
    }

    public function login()
    {
        return view('site.login.login');
    }

    public function logar(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('cliente')->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('cliente');
        }

        return redirect()->back()->withError('Essas credenciais não correspondem a nenhum registro encontrado!');
    }

    public function logout()
    {
        Auth::guard('cliente')->logout();

        return redirect()->route('login');
    }
}
