<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\Agendamento;

use PDF;

class AgendamentoController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $agendamentos = Agendamento::when(isset($request->s), function($query) use ($request) {
                        $query->whereHas('cliente', function($subquery) use ($request) {
                                return $subquery->where('name', 'LIKE', "%{$request->s}%");
                            })
                            ->orWhereHas('servico', function($subquery) use ($request) {
                                return $subquery->where('title', 'LIKE', "%{$request->s}%");
                            })
                            ->orWhere('protocolo', 'LIKE', "%{$request->s}%");
                    })
                    ->orderByRaw("CASE WHEN ic_status = 0 THEN 1 when ic_status = 2 then 2 when ic_status = 1 then 3 ELSE created_at END DESC")
                    ->orderBy('dt_agendamento', 'ASC')
                    ->orderBy('hr_agendamento', 'ASC')
                    ->paginate(10);

        $filters = $request->all();

        $status = [
            0 => 'Cancelado',
            1 => 'Aguardando',
            2 => 'Finalizado'
        ];

        return view('admin.pages.agenda.agendados.index', compact('agendamentos', 'filters', 'status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function finish(Agendamento $agendamento)
    {
       if($agendamento->update(['ic_status' => 2])) {
            return back()->withSuccess('Agendamento finalizado com sucesso!');
       }

       return back()->withError('Erro ao finalizar o agendamento!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agendamento $agendamento)
    {
       if($agendamento->update(['ic_status' => 0])) {
            return back()->withSuccess('Agendamento cancelado com sucesso!');
       }

       return back()->withError('Erro ao cancelar o agendamento!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function comprovante(Agendamento $agendamento)
    {
       return PDF::loadView('export.invoice', compact('agendamento'))->stream('comprovante.pdf');
    }
}
