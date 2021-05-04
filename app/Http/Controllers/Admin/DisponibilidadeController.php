<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

// Requests
use Illuminate\Http\Request;
use App\Http\Requests\ClienteRequest;

// Models
use App\Models\DiasDaSemana;

class DisponibilidadeController extends Controller
{
       /**
     * Show the form for configure the times of disponibility.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dias_semana = DiasDaSemana::with('horario_funcionamento')->get();

        return view('admin.pages.agenda.disponibilidade.index', compact('dias_semana'));
    }
}
