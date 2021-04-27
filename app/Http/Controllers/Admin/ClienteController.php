<?php

namespace App\Http\Controllers\Admin;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clientes = Cliente::when(isset($request->s), function($query) use ($request) {
                            $query->where('name', 'LIKE', "%{$request->s}%")
                                ->orWhere('email', 'LIKE', "%{$request->s}%")
                                ->orWhere('phone', 'LIKE', "%{$request->s}%");
                        })
                        ->latest()
                        ->paginate(10);

        $filters = $request->all();

        return view('admin.pages.clientes.index', compact('clientes', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.clientes.create');
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
            return redirect()->route('admin.clientes.index')->withSuccess('Cliente adicionado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar adicionar o cliente! Tente novamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('admin.pages.clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, Cliente $cliente)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ];

        if(isset($request->password) && !empty($request->password)) {
            $update['password'] = \Hash::make($request->password);
        }

        if($cliente->update($update)) {
            return redirect()->route('admin.clientes.index')->withSuccess('Cliente editado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar editar os dados do cliente! Tente novamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        if($cliente->delete()) {
            return back()->withSuccess('Cliente deletado com sucesso!');
        }

        return back()->withError('Ocorreu um erro ao tentar deletar o cliente! Tente novamente.');
    }
}
