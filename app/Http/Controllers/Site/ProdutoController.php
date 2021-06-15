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
                            return $query->where('modelo', 'LIKE', "%{$request->s}%");
                        })
                        ->where('quantidade', '>', 0)
                        ->paginate(9);

        $filtros = $request->all();

        return view('site.produto.index', \compact('produtos', 'filtros'));
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

        $mensagem = "
            Olá, eu tenho interesse no produto \"{$produto->modelo}\"
        ";

        return view('site.produto.show', \compact('produto', 'produtos', 'mensagem'));
    }
}
