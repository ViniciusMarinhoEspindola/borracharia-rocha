<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\Contato;

class ContatoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contatos = Contato::when(isset($request->s), function($query) use ($request) {
                        $query->where('name', 'LIKE', "%{$request->s}%")
                            ->orWhere('email', 'LIKE', "%{$request->s}%")
                            ->orWhere('phone', 'LIKE', "%{$request->s}%");
                    })
                    ->latest()
                    ->paginate(10);

        $filters = $request->all();

        return view('admin.pages.contatos.index', compact('contatos', 'filters'));
    }
}
