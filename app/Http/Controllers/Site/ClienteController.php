<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

// Models
use App\Models\Cliente;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('site.cliente.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.login.signUp');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => \Hash::make($request->password)
        ];

        if(Cliente::create($create)) {
            return redirect()->route('login')->withSuccess('Cadastrado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar fazer o cadastro! Tente novamente.');
    }
}
