<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Pneus;
use App\Models\ImagemPneu;

class PneuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pneus = Pneus::when(isset($request->s), function($query) use ($request) {
                        $query->where('modelo', 'LIKE', "%{$request->s}%")
                            ->orWhere('largura', 'LIKE', "%{$request->s}%")
                            ->orWhere('perfil', 'LIKE', "%{$request->s}%")
                            ->orWhere('aro', 'LIKE', "%{$request->s}%")
                            ->orWhere('valor', 'LIKE', "%{$request->s}%")
                            ->orWhere('quantidade', 'LIKE', "%{$request->s}%")
                            ->orWhere('descricao', 'LIKE', "%{$request->s}%");
                    })
                    ->latest()
                    ->paginate(10);

        $filters = $request->all();

        return view('admin.pages.pneus.index', compact('pneus', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.pneus.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $create = [
            'modelo' => $request->modelo,
            'largura' => $request->largura,
            'perfil' => $request->perfil,
            'aro' => $request->aro,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade,
            'descricao' => $request->descricao
        ];

        $pneu = Pneus::create($create);

        if($pneu) {

            if($request->has('imagens') && !empty($request->imagens)) {
                foreach($request->imagens as $key => $imagem) {
                    $filename = time().'-'.$imagem->getClientOriginalName();

                    $imagem->storeAs('uploads/pneus', $filename);

                    ImagemPneu::create([
                        'img' => $filename,
                        'ordem' => $key,
                        'pneu_id' => $pneu->id
                    ]);
                }
            }

            return redirect()->route('admin.pneus.index')->withSuccess('Pneu adicionado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar adicionar o pneu! Tente novamente.');
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
        $imagens = ImagemPneu::where('pneu_id', $pneu->id)->orderBy('ordem')->get();

        return view('admin.pages.pneus.edit', compact('pneu', 'imagens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pneus $pneu)
    {
        $update = [
            'modelo' => $request->modelo,
            'largura' => $request->largura,
            'perfil' => $request->perfil,
            'aro' => $request->aro,
            'valor' => $request->valor,
            'quantidade' => $request->quantidade,
            'descricao' => $request->descricao
        ];

        $pneu->update($update);

        return redirect()->route('admin.pneus.index')->withSuccess('Pneu editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pneus  $pneu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pneus $pneu)
    {
        try {
            $pneu->delete();
        } catch(\Exception $e) {
            \Log::error('Erro ao deletar pneu: ' . $e->getMessage());

            return back()->withError('Ocorreu um erro ao tentar remover o pneu! Tente novamente.');
        }

        return back()->withSuccess('Pneu deletado com sucesso!');
    }
}
