<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Anuncio;
use App\Models\Pneus;
use App\Models\ImagemPneu;

class AnuncioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $anuncios = Anuncio::orderBy('ordem')->get();

        return view('admin.pages.anuncios.index', compact('anuncios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ordem = Anuncio::count();
        $create = [
            'pneu_id' => $request->id,
            'ordem' => $ordem+1,
        ];

        $anuncio = Anuncio::create($create);

        if($anuncio) {
            $anuncios = Anuncio::with(['pneu'])->orderBy('ordem')->get();

            return response()->json($anuncios);
        }

        return response()->json(['error' => 'Ocorreu um erro ao tentar adicionar o anúncio' ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pneus $pneus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function edit(Pneus $pneu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        foreach($request->order as $key => $id) {
            Anuncio::findOrFail($id)->update(['ordem' => $key]);
        }

        return response()->json('Reordenado com sucesso!', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try {
            $anuncio = Anuncio::find($request->anuncio_id);
            $anuncio->delete();
        } catch(\Exception $e) {
            \Log::error('Erro ao deletar o anuncio: ' . $e->getMessage());

            return response()->json(['error' => 'Ocorreu um erro ao tentar remover o anúncio' ]);
        }

        $anuncios = Anuncio::with(['pneu'])->orderBy('ordem')->get();

        return response()->json($anuncios);
    }
}
