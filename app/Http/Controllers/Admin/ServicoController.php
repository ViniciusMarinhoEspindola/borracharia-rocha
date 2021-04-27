<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ServicoRequest;

// Models
use App\Models\Pneus;
use App\Models\Servico;

class ServicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $servicos = Servico::when(isset($request->s), function($query) use ($request) {
                            $query->where('title', 'LIKE', "%{$request->s}%")
                                ->orWhere('type', 'LIKE', "%{$request->s}%")
                                ->orWhere('estimated_time', 'LIKE', "%{$request->s}%")
                                ->orWhere('description', 'LIKE', "%{$request->s}%");
                        })
                        ->latest()
                        ->paginate(10);

        $filters = $request->all();

        return view('admin.pages.servicos.index', compact('servicos', 'filters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pneus = Pneus::orderBy('modelo', 'ASC')->get();

        return view('admin.pages.servicos.create', compact('pneus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServicoRequest $request)
    {
        $create = [
            'title' => $request->title,
            'type' => $request->type,
            'estimated_time' => $request->estimated_time,
            'description' => $request->description,
            'pneu_id' => $request->has('pneu_id') ? $request->pneu_id : null
        ];

        if(Servico::create($create)) {
            return redirect()->route('admin.servicos.index')->withSuccess('Serviço adicionado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar adicionar o serviço! Tente novamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function show(Servico $servico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function edit(Servico $servico)
    {
        $pneus = Pneus::orderBy('modelo', 'ASC')->get();

        return view('admin.pages.servicos.edit', compact('servico', 'pneus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServicoRequest  $request
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function update(ServicoRequest $request, Servico $servico)
    {
        $update = [
            'title' => $request->title,
            'type' => $request->type,
            'estimated_time' => $request->estimated_time,
            'description' => $request->description,
            'pneu_id' => $request->has('pneu_id') ? $request->pneu_id : null
        ];

        if($servico->update($update)) {
            return redirect()->route('admin.servicos.index')->withSuccess('Serviço editado com sucesso!');
        }

        return back()->withInput()->withError('Ocorreu um erro ao tentar editar os dados do serviço! Tente novamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servico  $servico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servico $servico)
    {
        if($servico->delete()) {
            return back()->withSuccess('Serviço deletado com sucesso!');
        }

        return back()->withError('Ocorreu um erro ao tentar deletar o serviço! Tente novamente.');
    }
}
