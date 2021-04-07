<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

// Models
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::when(isset($request->s), function($query) use ($request) {
                        $query->where('name', 'LIKE', "%{$request->s}%")
                             ->orWhere('email', 'LIKE', "%{$request->s}%");
                    })
                    ->latest()
                    ->paginate(10);

        $filters = $request->all();

        return view('admin.users.index', compact('users', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $create = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password)
        ];

        if(User::create($create)) {
            return redirect()->route('admin.users.index')->withSuccess('Usuário adicionado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar adicionar o usuário! Tente novamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UserRequest  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $update = [
            'name' => $request->name,
            'email' => $request->email
        ];

        if(isset($request->password) && !empty($request->password)) {
            $update['password'] = \Hash::make($request->password);
        }

        if($user->update($update)) {
            return redirect()->route('admin.users.index')->withSuccess('Usuário editado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar editar os dados do usuário! Tente novamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if($user->delete()) {
            return back()->withSuccess('Usuário deletado com sucesso!');
        }

        return back()->withError('Ocorreu um erro ao tentar deletar o usuário! Tente novamente.');
    }
}
