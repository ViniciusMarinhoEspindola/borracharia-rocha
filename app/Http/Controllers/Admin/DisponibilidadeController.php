<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;

// Models
use App\Models\DiasDaSemana;
use App\Models\HorarioFuncionamento;

class DisponibilidadeController extends Controller
{
    /**
     * Show the form for configure the times of disponibility.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias_semana = DiasDaSemana::with('horarios_funcionamento')->get();

        return view('admin.pages.agenda.disponibilidade.index', compact('dias_semana'));
    }

    /**
     * Toggle day of the week operation.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\DiasDaSemana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function toggleFuncionamento(Request $request, DiasDaSemana $dia_semana)
    {
        if($dia_semana->update(['ic_funcionamento' => $request->funcionamento])) {
            $check_horario = HorarioFuncionamento::where('dias_semana_id', $dia_semana->id)->first();

            if(!$check_horario) {
                HorarioFuncionamento::create([
                    'hr_inicio' => '09:00:00',
                    'hr_termino'  => '18:00:00',
                    'dias_semana_id' => $dia_semana->id
                ]);
            }

            return response()->json('Salvo com sucesso!', 200);
        }

        return response()->json('Erro ao tentar alterar o status de funcionamento!', 500);
    }

    /**
     * Toggle day of the week operation.
     *
     * @param \Illuminate\Http\Request  $request
     * @param \App\Models\DiasDaSemana  $dia_semana
     * @return \Illuminate\Http\Response
     */
    public function addHorario(Request $request, DiasDaSemana $dia_semana)
    {
        $create = [
            'hr_inicio' => $request->de,
            'hr_termino'  => $request->ate,
            'dias_semana_id' => $dia_semana->id
        ];

        if(HorarioFuncionamento::updateOrCreate(['dias_semana_id' => $dia_semana->id], $create)) {
            return response()->json('Salvo com sucesso!', 200);
        }

        return response()->json('Erro ao tentar salvar as configurações!', 500);
    }
}
