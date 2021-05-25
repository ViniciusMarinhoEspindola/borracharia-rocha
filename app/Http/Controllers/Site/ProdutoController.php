<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\Pneus;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produtos = Pneus::latest()
                        ->when(isset($request->s), function($query) use ($request) {
                            return $query->where('marca', 'LIKE', "%{$request->s}%");
                        })
                        ->paginate(9);

        return view('site.produto.index', \compact('produtos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pneus  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Pneus $produto)
    {
        $produtos = Pneus::latest()
                        ->where('id', $produto->id)
                        ->paginate(6);

        return view('site.produto.show', \compact('produto', 'produtos'));
    }
}
